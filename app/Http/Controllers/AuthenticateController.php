<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    function index() 
    {
        return view();
    }

    function login(Request $request) 
    {
        $request->validate([
            'username' => 'required',
            'password'=> 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required'=> 'Password wajib diisi',
        ]);

        $infologin = [
            'username'=> $request->username,
            'password'=> $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    }
}
