<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FolderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'title' => ['required', 'max:100', 'unique:folders'],
    ]);

    $parent = $request->parent_folder_id ?? 1; // Using null coalescing operator for simplicity
    $title = $request->title;
    
    // Call the createSlug method directly on Str class, passing the title
    $slug = Str::slug($title);

    $folder = new Folder;
    $folder->title = $title;
    $folder->slug = $slug;
    $folder->status = "active";
    $folder->parent_folder_id = $parent;
    $folder->save();
}

    protected function createSlug($title)
    {
        $slug = Str::slug($title);
        $count = Folder::where('slug', 'like', $slug . '%')->count();

        return $count > 0 ? "{$slug}-" . ($count + 1) : $slug;
    }
}
