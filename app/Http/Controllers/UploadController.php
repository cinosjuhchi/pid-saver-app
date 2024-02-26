<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image_location.*' => 'image|file|max:50014',
        ]);
    
        $uploadedImages = [];
    
        foreach ($request->file('image_location') as $image) {
            $title = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $counter = 1;
            $newName = $title;
    
            while (Photo::where('title', $newName)->exists()) {
                $newName = $title . '(' . $counter . ')';
                $counter++;
            }
    
            $title = $newName;
    
            $folder = $request->parent_folder_id ?? 1;
            $slug = Str::slug($title);
            $status = "active";
    
            $photo = new Photo();
            $photo->title = $title;
            $photo->image_location = $image->store('user-images');
            $photo->place_folder_id = $folder;
            $photo->slug = $slug;
            $photo->status = $status;
            $photo->save();
    
            $uploadedImages[] = $photo;
        }
    
        return back()->with('success', 'Gambar berhasil diunggah')->with('uploadedImages', $uploadedImages);


        



    }

}
