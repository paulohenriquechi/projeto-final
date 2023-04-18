<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Review;
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
        $songsInfo = Song::where('album', $albumInfo->album_name)->get();
        $reviews = Review::orderBy('updated_at', 'desc')->where('album', $albumInfo->album_name)->get();
        $albumInfo->songs = $songsInfo;
        $albumInfo->reviews = $reviews;
        return $albumInfo;
    }

    // public function albumSongs($album){
    //     $album = Album::where('album_url', $album)->firstOrFail();
    //     $songs = $album->songs()->get();
    //     return $songs;
    // }
}
