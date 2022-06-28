<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Image;
use App\Models\Settings;
use App\Models\subscriptions;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( 'login', [ LoginController::class, 'create' ] )->name( 'login' );
Route::post( 'login', [ LoginController::class, 'store' ] );
Route::post( 'logout', [ LoginController::class, 'destroy' ] )->middleware( 'auth' );


Route::middleware( 'auth' )->group( function () {
    Route::get( '/', function () {
        $subscriptions = subscriptions::all();
        $total_revenue = 0;

        foreach ( $subscriptions as $subscription ) {
            $sub[ $subscription->id ] = (float) $subscription->value;
            $total_revenue            += User::where( 'subscription', $subscription->id )->count() * (float) $subscription->value;
        }

        return Inertia::render( 'Home', [
            'total_users'   => User::all()->count(),
            'new_users'     => User::where( 'created_at', '>=', new DateTime( '-1 months' ) )->count(),
            'total_revenue' => $total_revenue,
            'about'         => Settings::where( 'name', 'about' )->get( 'value' )[0]->value,
            'email'         => Settings::where( 'name', 'email' )->get( 'value' )[0]->value,
            'phone'         => Settings::where( 'name', 'phone' )->get( 'value' )[0]->value,
            'address'       => Settings::where( 'name', 'address' )->get( 'value' )[0]->value,
        ] );
    } );

    Route::get( '/users/', function () {
        return Inertia::render( 'Users/Index', [
            'users'   => User::query()
                             ->when( Request::input( 'search' ), function ( $query, $search ) {
                                 $query->where( 'name', 'like', "%{$search}%" )->orwhere( 'email', 'like', "%{$search}%" );
                             } )
                             ->paginate( 10 )
                //keep all queries
                             ->withQueryString()
                             ->through( fn( $user ) => [
                                 'id'    => $user->id,
                                 'name'  => $user->name,
                                 'email' => $user->email,
                                 'can'   => [
                                     'edit' => Auth::user()->can( 'edit', $user )
                                 ]
                             ] ),
            'filters' => Request::only( [ 'search' ] ),
            'can'     => [
                'createUser' => Auth::user()->can( 'create', User::class )
            ]
        ] );
    } );

    //Create new User
    Route::get( '/users/create', function () {
        return Inertia::render( 'Users/Create', [
            'subscriptions' => subscriptions::all()
                                            ->map( fn( $subscription ) => [
                                                'id'    => $subscription->id,
                                                'name'  => $subscription->name,
                                                'value' => $subscription->value
                                            ] )
        ] );
    } )->middleware( 'can:create,App\Models\User' );

    Route::post( '/users', function ( Illuminate\Http\Request $request ) {
        //validate the request
        $attributes = $request->validate( [
            'name'         => 'required',
            'email'        => [ 'required', 'email' ],
            'password'     => 'required',
            'subscription' => 'required',
            'role'         => 'required',
            'new_user'     => 'required'
        ] );

        //create or update the user
        if ( ! $attributes['new_user'] ) {
            DB::table( 'users' )
              ->where( 'id', $request['id'] )
              ->update( [
                  'name'         => $attributes['name'],
                  'email'        => $attributes['email'],
                  'password'     => bcrypt( $attributes['password'] ),
                  'subscription' => $attributes['subscription'],
                  'role'         => $attributes['role']
              ] );
        } else if ( User::where( 'email', '=', $attributes['email'] )->exists() && $attributes['new_user'] ) {
            return "<h1 style='display: flex;justify-content: center;align-items: center;height: 100%;'>This email is already used</h1>";
        } else {
//
            User::create( $attributes );
        }

        //redirect
        return redirect( '/users' );
    } );

    //Edit user
    Route::get( '/user/{id}/edit', function ( $id ) {
        $user = DB::table( 'users' )->where( 'id', $id )->first();

        return Inertia::render( 'Users/Edit', [
            'id'            => $id,
            'name'          => $user->name,
            'email'         => $user->email,
            'role'          => $user->role,
            'subscription'  => $user->subscription,
            'subscriptions' => subscriptions::all()
                                            ->map( fn( $subscription ) => [
                                                'id'    => $subscription->id,
                                                'name'  => $subscription->name,
                                                'value' => $subscription->value
                                            ] )
        ] );
    } )->middleware( 'can:edit,App\Models\User' );

    //Delete user
    Route::get( '/user/{id}/delete', function ( $id ) {
        $user = DB::table( 'users' )->where( 'id', $id )->first();

        return Inertia::render( 'Users/Delete', [
            'id'   => $id,
            'name' => $user->name,
        ] );
    } )->middleware( 'can:edit,App\Models\User' );

    Route::post( '/user/{id}/deleted', function ( $id ) {
        User::find( $id )->delete();

        return redirect( '/users?user-' . $id . '=deleted' );
    } )->middleware( 'can:edit,App\Models\User' );

    //Image uploader
    Route::get( '/image', [ ImageController::class, 'show' ] );
    Route::post( '/upload', [ ImageController::class, 'store' ] );

    //Subscription
    Route::get( '/subscriptions', function () {
        return Inertia::render( 'Subscriptions/Index', [
            'subscriptions' => subscriptions::all(),
            'can'           => [
                'edit' => Auth::user()->can( 'create', User::class )
            ]
        ] );
    } )->middleware( 'can:create,App\Models\User' );

    Route::post( '/subscriptions', function (Illuminate\Http\Request $request ) {
        //validate the request
        $attributes = $request->validate( [
            'name'             => 'required',
            'value'            => 'required',
            'new_subscription' => 'required'
        ] );
        //create or update the user
        if ( ! $attributes['new_subscription'] ) {
            DB::table( 'subscriptions' )
              ->where( 'id', $request['id'] )
              ->update( [
                  'name'  => $attributes['name'],
                  'value' => $attributes['value'],
              ] );
        } else if ( subscriptions::where( 'name', '=', $attributes['name'] )->exists() && $attributes['new_subscription'] ) {
            return "<h1 style='display: flex;justify-content: center;align-items: center;height: 100%;'>This subscription is already used</h1>";
        } else {
            subscriptions::create( $attributes );
        }

        //redirect
        return redirect( '/subscriptions' );
    } );

    //Create subscription
    Route::get( '/subscriptions/create', function () {
        return Inertia::render( 'Subscriptions/Create' );
    } )->middleware( 'can:create,App\Models\User' );

    //Edit subscription
    Route::get( '/subscription/{id}/edit', function ( $id ) {
        $user = DB::table( 'subscriptions' )->where( 'id', $id )->first();

        return Inertia::render( 'Subscriptions/Edit', [
            'id'    => $id,
            'name'  => $user->name,
            'value' => $user->value,
        ] );
    } )->middleware( 'can:edit,App\Models\User' );

    //Delete subscription
    Route::get( '/subscription/{id}/delete', function ( $id ) {
        $user = DB::table( 'subscriptions' )->where( 'id', $id )->first();

        return Inertia::render( 'Subscriptions/Delete', [
            'id'   => $id,
            'name' => $user->name,
        ] );
    } )->middleware( 'can:edit,App\Models\User' );

    Route::post( '/subscription/{id}/deleted', function ( $id ) {
        subscriptions::find( $id )->delete();

        return redirect( '/subscriptions?user-' . $id . '=deleted' );

    } )->middleware( 'can:edit,App\Models\User' );

    //Settings
    Route::get( '/settings', function () {
        return Inertia::render( 'Settings', [
            'image'   => Settings::where( 'name', 'image' )->get( 'value' )[0]->value,
            'about'   => Settings::where( 'name', 'about' )->get( 'value' )[0]->value,
            'email'   => Settings::where( 'name', 'email' )->get( 'value' )[0]->value,
            'address' => Settings::where( 'name', 'address' )->get( 'value' )[0]->value,
            'phone'   => Settings::where( 'name', 'phone' )->get( 'value' )[0]->value
        ] );
    } )->middleware( 'can:edit,App\Models\User' );

    Route::post( '/settings', function () {
        $attributes = Request::validate( [
            'image'   => 'required',
            'about'   => 'required',
            'email'   => 'required',
            'address' => 'required',
            'phone'   => 'required',
        ] );

//        return $attributes;
        $last_image = Image::count();

        Settings::where( 'name', 'image' )->update( [ 'value' => Image::where( 'id', $last_image )->value( 'path' ) ] );
        Settings::where( 'name', 'about' )->update( [ 'value' => $attributes['about'] ] );
        Settings::where( 'name', 'email' )->update( [ 'value' => $attributes['email'] ] );
        Settings::where( 'name', 'address' )->update( [ 'value' => $attributes['address'] ] );
        Settings::where( 'name', 'phone' )->update( [ 'value' => $attributes['phone'] ] );

        return redirect( '/settings' );
    } )->middleware( 'can:edit,App\Models\User' );
} );

