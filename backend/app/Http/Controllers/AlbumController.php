<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function albums(){
        $albums = Album::all();
        return $albums;
    }

    public function album($album){
        $album = Album::where('album_url', $album)->firstOrFail();
        return $album;
    }

    public function albumSongs($album){
        $album = Album::where('album_url', $album)->firstOrFail();
        $songs = $album->songs()->get();
        return $songs;
    }
}
