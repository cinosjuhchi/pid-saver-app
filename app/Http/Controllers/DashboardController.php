<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $title = "beranda";
        return view('home')->with(['title'=> $title]);
    }
}
