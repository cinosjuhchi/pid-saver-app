<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhotoController extends Controller
{
    public function show($slug)
    {
        $title ='Preview';
        $id = $slug;
        $photo = Photo::where('slug', $id)->first();
        return view('preview', compact('title', 'photo'));
    }
}
