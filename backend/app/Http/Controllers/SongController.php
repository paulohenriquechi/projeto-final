<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function songs(){
        $songs = Song::all();
        return $songs;
    }

    public function song($song){
        $songInfo = Song::where('song_url', $song)->firstOrFail();
        $albumInfo = Album::where('album_name', $songInfo->album)->get();
        $songInfo->albumInfo = $albumInfo;
        return $songInfo;
    }
}