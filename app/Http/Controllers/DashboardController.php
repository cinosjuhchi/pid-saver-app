<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = "Beranda";
        $filterActive = null;
        $identity = 'beranda';
        $folder = Folder::find(1);
        
        $location = $request->input('loc');

        if ($request->has('filter') && $request->input('filter') === 'photo') {
            $photos = $this->filterAppPhotos($location, $identity);
            $folders = collect(); // Empty collection as folders are not needed in this case            
            $filterActive = 'photo';
        } elseif ($request->has('filter') && $request->input('filter') === 'folder') {
            $folders = $this->filterAppFolders($location, $identity);
            $photos = collect(); // Empty collection as photos are not needed in this case            
            $filterActive = 'folder';
        } else {
            // Fetch both photos and folders if no specific filter is selected
            $photos = Photo::where('place_folder_id', 1)
            ->where('status', '!=', 'archive')
            ->get();
            $folders = Folder::where('parent_folder_id', 1)
            ->where('status', '!=', 'archive')
            ->get();;
        }
        return view('home', compact('folder', 'title', 'photos', 'folders', 'identity', 'filterActive'));

    }

    private function filterAppPhotos($loc, $iden)
    {
        if($iden == 'beranda' || $iden == 'show')
        {
            return Photo::where('place_folder_id', $loc)            
            ->where('status', '!=', 'archive')
            ->get();
        } 
        if($iden == 'archive')
        {
            return Photo::where('status', '=', 'archive')
            ->get();
        } 
        if($iden == 'favorite')
        {
            return Photo::where('status', '=', 'favorite')
            ->get();
        }
        
    }
    private function filterAppFolders($loc, $iden)
    {

        if($iden == 'beranda' || $iden == 'show')
        {
            return Folder::where('parent_folder_id', $loc)
            ->where('id', '!=', 1)
            ->where('status', '!=', 'archive')
            ->get();
        } 
        if($iden == 'archive')
        {
            return Folder::where('id', '!=', 1)
            ->where('status', '=', 'archive')
            ->get();
        } 
        if($iden == 'favorite')
        {
            return Folder::where('id', '!=', 1)
            ->where('status', '=', 'favorite')
            ->get();
        }

    }

    public function photo()
    {
        $title = "Photo";
        $identity = 'photo';
        $photos = Photo::where('status', '!=', 'archive')->get();
        $folders = Folder::where('status', '!=', 'archive');
        return view('home', compact('title', 'photos','folders', 'identity'));

    }

    public function folder()
    {
        $identity = 'folder';        
        $title = "Folder";
        $photos = Photo::where('status', '!=', 'archive')->get();
        $folders = Folder::where('status', '!=', 'archive')
        ->where('parent_folder_id', 1)
        ->get();
        return view('home', compact('title', 'photos','folders', 'identity'));

    }

    
    public function archive(Request $request)
    {
        $identity = 'archive';
        $title = "Archive";
        $filterActive = null;
        $folder = Folder::find(1);
        $location = null;

        if ($request->has('filter') && $request->input('filter') === 'photo') {
            $photos = $this->filterAppPhotos($location, $identity);
            $folders = collect(); // Empty collection as folders are not needed in this case            
            $filterActive = 'photo';
        } elseif ($request->has('filter') && $request->input('filter') === 'folder') {
            $folders = $this->filterAppFolders($location, $identity);
            $photos = collect(); // Empty collection as photos are not needed in this case            
            $filterActive = 'folder';
        } else {
            // Fetch both photos and folders if no specific filter is selected
            $photos = Photo::where('status', 'archive')
            ->get();
            $folders = Folder::where('status', 'archive')
            ->get();;
        }        
        return view('home', compact('folder', 'title', 'photos','folders', 'identity', 'filterActive'));

    }
    public function favorite()
    {
        $identity = 'favorite';
        $title = "Favorite";
        $filterActive = null;
        $folder = Folder::find(1);
        $photos = Photo::where('status', 'favorite')->get();
        $folders = Folder::where('status', 'favorite')->get();
        return view('home', compact('folder', 'title', 'photos','folders', 'identity', 'filterActive'));

    }

    public function searchFiles(Request $request)
    {
        $identity = 'search';
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

    return view('home', compact('photos', 'folders', 'title', 'identity'));
    }

}
