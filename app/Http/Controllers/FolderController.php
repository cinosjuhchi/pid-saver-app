<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Photo;
use App\Models\Folder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class FolderController extends Controller
{
    // public function show($slug)
    // {
    //     $folder = Folder::where('slug', $slug)->firstOrFail();
    //     $subFolders = $folder->subFolders;
    //     $photos = $folder->photos;
    //     $title = $folder->title;

    //     return view('folder', compact('subFolders', 'photos', 'folder', 'title'));
    // }


    // FolderController.php
// public function show(Request $request, $slug = null)
// {
//     $breadcrumbs = [];
//     $currentPath = '';
//     $folders = Folder::where('slug', $slug)->get();
//     $folder = Folder::where('slug', $slug)->firstOrFail();

//     foreach ($folders as $fold) {
//         $breadcrumbs[] = $this->createBreadcrumb($fold->title, route('folder-show', ['slug' => $fold->slug]));
//         $currentPath .= $fold->slug . '/';
//     }

//     $subFolders = $folders->last()->subFolders;
//     $photos = $folders->last()->photos;
//     $title = $folders->last()->title;

//     return view('folder', compact('folder', 'subFolders', 'photos', 'title', 'breadcrumbs'));
// }

public function show(Request $request, $slug)
    {
        $folder = Folder::where('slug', $slug)->firstOrFail();
        $parent = Folder::where('id', $folder->parent_folder_id)->firstOrFail();
        $location = $folder->id;
        $identity = 'show';
        $filterActive = null;

        if ($request->has('filter') && $request->input('filter') === 'photo') {
            $photos = $folder->photos;
            $folders = collect(); // Empty collection as folders are not needed in this case            
            $filterActive = 'photo';
        } elseif ($request->has('filter') && $request->input('filter') === 'folder') {
            $subFolders = $folder->subFolders;
            $photos = collect(); // Empty collection as photos are not needed in this case            
            $filterActive = 'folder';
        } else {
            $photos = $folder->photos->where('status', '!=', 'archive');
            $subFolders = $folder->subFolders->where('status', '!=', 'archive');
        }                
        $title = $folder->title;
        $identity = 'show';

        $breadcrumb = [];

        $breadcrumb = $this->createBreadcrumb($parent->title, route('folder-show', ['slug' => $parent->slug]));

        return view('folder', compact('subFolders', 'photos', 'folder', 'title', 'breadcrumb', 'identity', 'filterActive'));
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


private function createBreadcrumb($label, $url)
{
    return [
        'label' => $label,
        'url' => $url,
    ];
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:100', 'unique:folders'],
        ]);
        // Using null coalescing operator for simplicity
        $title = $request->title;
        $counter = 1;
        $newName = $title;

        // Cek apakah file dengan nama yang sama sudah ada
        while (Folder::where('title', $newName)->exists()) {
            $newName = $title . '(' . $counter . ')';
            $counter++;
        }
        $title = $newName;
        $parent = $request->parent_folder_id;

        // Call the createSlug method directly on Str class, passing the title
        $slug = Str::slug($title);

        $folder = new Folder();
        $folder->title = $title;
        $folder->slug = $slug;
        $folder->status = "active";
        $folder->parent_folder_id = $parent;
        $folder->save();
        return redirect()->back()->with("success", "berhasil");

    }

    protected function createSlug($title)
    {
        $slug = Str::slug($title);
        $count = Folder::where('slug', 'like', $slug . '%')->count();

        return $count > 0 ? "{$slug}-" . ($count + 1) : $slug;
    }

    protected function folderHasPhotos($folder)
{
    // Memeriksa apakah folder memiliki foto
    if (!$folder->photos->isEmpty()) {
        return true;
    }

    // Memeriksa apakah subfolder memiliki foto
    foreach ($folder->subFolders as $subfolder) {
        if ($this->folderHasPhotos($subfolder)) {
            return true;
        }
    }

    return false;
}

    public function zipFolder($folderId)
    {
        $isiFolder = Folder::find($folderId);
        if (!$this->folderHasPhotos($isiFolder)) {
        toast('Zip gagal dibuat,minimal ada 1 foto didalam nya','error');
        return back();
        }
        // if($isiFolder->)
        $folder = Folder::findOrFail($folderId);

        $zipFileName = "folder_{$folderId}_contents.zip";
        $zipFilePath = storage_path("app/public/{$zipFileName}");

        $zip = new ZipArchive();

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
            $this->addFolderToZip($folder, $zip);
            $zip->close();

            return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend();
        }

        abort(500, 'Failed to create zip file.');
    }

    protected function addFolderToZip($folder, $zip, $parentPath = '')
    {
        $photos = $folder->photos;
        foreach ($photos as $photo) {
            $photoPath = storage_path("app/public/{$photo->image_location}");
            $relativePath = $parentPath . $photo->title . '.jpg';
            $zip->addFile($photoPath, $relativePath);
        }

        $subFolders = $folder->subFolders;
        foreach ($subFolders as $subFolder) {
            $this->addFolderToZip($subFolder, $zip, $parentPath . $subFolder->title . '/');
        }
    }

    public function favorite($id)
    {
        $folder = Folder::find($id);
        $folder->update(['status' => 'favorite']);
        return back()->with('success', 'Difavoritkan');
    }

    public function archive($id)
    {
        $folder = Folder::find($id);
        $folder->update(['status' => 'archive']);
        return back()->with('success', 'Diarsipkan');
    }
    public function unstatus($id)
    {
        $folder = Folder::find($id);
        $folder->update(['status' => 'active']);
        return back()->with('success', 'Berhasil Dihapus');
    }
}
