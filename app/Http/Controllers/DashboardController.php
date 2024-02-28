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
        $photos = Photo::where('status', '!=', 'archive')->get();
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
        $search = $request->input('search_title');
        $category = $request->input('title_search');
        $title = $category;

    if ($search) {
        if($category == 'Beranda' || $category == 'Folder' || $category == 'Photo'){
            $photos = Photo::where('title', 'like', "%{$search}%")
            ->where('status', '!=', 'archive')
            ->get();
            $folders = Folder::where('title', 'like', "%{$search}%")
            ->where('status', '!=', 'archive')
            ->get();
        }
        if($category == 'Archive'){
            $photos = Photo::where('title', 'like', "%{$search}%")
            ->where('status', '=', 'archive')
            ->get();
            $folders = Folder::where('title', 'like', "%{$search}%")
            ->where('status', '=', 'archive')
            ->get();
        }

        
    } else {
        // Jika pencarian kosong, tampilkan semua file
        if($category == 'Beranda' || $category == 'Photo' || $category == 'Folder'){
            $photos = Photo::where('status', '!=', 'archive')->get();
             $folders = Folder::where('status', '!=', 'archive')->get();
        }
        if($category == 'Archive'){
            $photos = Photo::where('status', '=', 'archive')->get();
             $folders = Folder::where('status', '=', 'archive')->get();
        }
        
        }

    return view('home', compact('photos', 'folders', 'title'));
    }

}
