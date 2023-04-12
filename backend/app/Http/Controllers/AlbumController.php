<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function albums(){
        $albums = Album::all();
        return $albums;
    }

    public function album($album){
        $albumInfo = Album::where('album_url', $album)->firstOrFail();
        $songsInfo = Song::where('album', $album)->get();
        $albumInfo->songs = $songsInfo;
        return $albumInfo;
    }

    // public function albumSongs($album){
    //     $album = Album::where('album_url', $album)->firstOrFail();
    //     $songs = $album->songs()->get();
    //     return $songs;
    // }
}
