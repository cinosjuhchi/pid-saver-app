<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
         $validateData = $request->validate([
            "image_location" => "image|file|max:50014"
        ]);

        if($request->file('image_location')) {
            $validateData['image_location'] = $request->file('image_location')->store('user-images');
        }
    

    }
    
}
