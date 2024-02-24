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
        $validateData = $request->validate([
            "image_location" => "image|file|max:50014"
        ]);

        $validateData['image_location'] = $request->file('image_location')->store('user-images');
        $title = pathinfo($request->file('image_location')->getClientOriginalName(), PATHINFO_FILENAME);
        $counter = 1;
        $newName = $title;

        // Cek apakah file dengan nama yang sama sudah ada
        while (Photo::where('title', $newName)->exists()) {
            $newName = $title . '(' . $counter . ')';
            $counter++;
        }

        // Setelah keluar dari loop, artinya kami telah menemukan nama yang unik
        $title = $newName;

        $folder = $request->parent_folder_id ?? 1;
        $slug = Str::slug($title);
        $status = "active";
        $photo = new Photo();
        $photo->title = $title;
        $photo->image_location = $validateData['image_location'];
        $photo->place_folder_id = $folder;
        $photo->slug = $slug;
        $photo->status = $status;
        $photo->save();

        return redirect()->route("dashboard")->with("success", "berhasil");



    }

}
