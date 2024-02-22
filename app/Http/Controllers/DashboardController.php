<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        $title = "beranda";
        $photos = Photo::where("place_folder_id", 1)->get();
        return view('home', compact('title', 'photos'));
    }
}
