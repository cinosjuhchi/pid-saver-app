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
                    ->where('status', '!=', 'archive')
                    ->get();
        return view('home', compact('title', 'photos', 'folders'));

    }

    public function photo()
    {
        $title = "Photo";
        $photos = Photo::where('status', '!=', 'archive')->get();
        $folders = Folder::where('status', '!=', 'archive');
        return view('home', compact('title', 'photos','folders'));

    }
    public function folder()
    {
        $title = "Folder";
        $photos = Photo::where('status', '!=', 'archive');
        $folders = Folder::where('status', '!=', 'archive')->get();
        return view('home', compact('title', 'photos','folders'));

    }
    public function archive()
    {
        $title = "Archive";
        $photos = Photo::where('status', '=', 'archive')->get();
        $folders = Folder::where('status', '=', 'archive')->get();
        return view('home', compact('title', 'photos','folders'));

    }

    public function searchFiles(Request $request)
    {
        $title = 'Search ' . $request->search_title;
        $search = $request->input('search_title');

    if ($search) {
        $photos = Photo::where('title', 'like', "%{$search}%")->get();
        $folders = Folder::where('title', 'like', "%{$search}%")->get();
    } else {
        // Jika pencarian kosong, tampilkan semua file
        $photos = Photo::all();
        $folders = Folder::all();
    }

    return view('home', compact('photos', 'folders', 'title'));
    }

}
