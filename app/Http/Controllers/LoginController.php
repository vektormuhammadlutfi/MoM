<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function authenticate(Request $request)
    {
        $credentianls = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentianls))
        {
            $request->session()->regenerate();
            require redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login filed!');
    }
}
