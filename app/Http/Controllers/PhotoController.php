<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function show()
    {
        $title ='preview';
        return view('preview', compact('title'));
    }
}
