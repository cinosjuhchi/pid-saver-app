<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Beranda";
        $photos = Photo::where("place_folder_id", 1)->get();
        $folders = Folder::where('parent_folder_id', 1)
                    ->where('id', '!=', 1)
                    ->get();
        return view('home', compact('title', 'photos', 'folders'));

    }
}
