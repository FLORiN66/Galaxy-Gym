<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller {
    public function create() {
        if (! Auth::check()) {
            return Inertia::render('Auth/Login');
        } else {
            return redirect(url()->previous() . '?loggedin');
        }
    }

    public function already_logged_in(){
        return 'User already logged in';
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('login');
    }
}
