<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    protected function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function show($slug)
    {
        $title = 'Preview';
        $id = $slug;
        $photo = Photo::where('slug', $id)->first();
        $ukuran = filesize('storage/' . $photo->image_location);

        $ukuran = $this->formatBytes($ukuran);

        return view('preview', compact('title', 'photo', 'ukuran'));
    }
}
