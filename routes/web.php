<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users/', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%")->orwhere('email', 'like', "%{$search}%");
                })
                ->paginate(10)
                //keep all queries
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });

    //Create new User

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->middleware('can:create,App\Models\User');

    Route::post('/users', function () {
        //validate the request
        $attributes = Request::validate([
            'id' => '',
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
            'role' => 'required',
            'new_user' => 'required'
        ]);
        //create or update the user
        if (!$attributes['new_user']) {
            DB::table('users')
                ->where('id', $attributes['id'])
                ->update([
                    'name' => $attributes['name'],
                    'email' => $attributes['email'],
                    'password' => bcrypt($attributes['password']),
                    'role' => $attributes['role']
                ]);
        } else if (User::where('email', '=', $attributes['email'])->exists() && $attributes['new_user']) {
            return "<h1 style='display: flex;justify-content: center;align-items: center;height: 100%;'>This email is already used</h1>";
        } else {
            User::create($attributes);
        }
        //redirect
        return redirect('/users');
    });

    //Edit user
    Route::get('/user/{id}/edit', function ($id) {
        $user = DB::table('users')->where('id', $id)->first();

        return Inertia::render('Users/Edit', [
            'id' => $id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ]);
    })->middleware('can:edit,App\Models\User');

    //Delete user
    Route::get('/user/{id}/delete', function ($id) {
        $user = DB::table('users')->where('id', $id)->first();

        return Inertia::render('Users/Delete', [
            'id' => $id,
            'name' => $user->name,
//            'email' => $user->email,
//            'role' => $user->role,
        ]);
    })->middleware('can:edit,App\Models\User');

    Route::post('/user/{id}/deleted', function ($id) {

        User::find($id)->delete();
        return redirect('/users?user-'. $id .'=deleted');

    })->middleware('can:edit,App\Models\User');


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

});

