<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('register.register');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:20|unique:users',
            'firs_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'password' => 'required|min:5|max:30'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        // return dd('regis berhasil'); 
        User::create($validateData);
        // $request->session()->flash('success', 'Register Successfull, Please Login!');
        return redirect('/login')->with('success', 'Register Successfull, Please Login!');
    }
}
