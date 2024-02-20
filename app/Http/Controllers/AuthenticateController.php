<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    function index() 
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login.index');
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

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/autentikasi');
    }

    }
