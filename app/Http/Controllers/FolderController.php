<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Folder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FolderController extends Controller
{

    public function show($slug)
    {
        $folder = Folder::where('slug', $slug)->firstOrFail();
        $subFolders = $folder->subFolders;
        $photos = $folder->photos;
        $title = $folder->title;

        return view('folder', compact('subFolders','photos','folder', 'title'));
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

    $folder = new Folder;
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

    public function zipFolder($folderId)
    {
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
}
