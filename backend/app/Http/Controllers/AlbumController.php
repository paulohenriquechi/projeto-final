<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function show(){
        $albums = Album::all();
        return $albums;
    }

    public function album($album){
        $album = Album::where('album_url', $album)->firstOrFail();
        return $album;
    }
}
