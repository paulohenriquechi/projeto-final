<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function songs(){
        $songs = Song::orderBy('song_name', 'asc')->get();
        foreach($songs as $song){
            $albumInfo = Album::where('album_name', $song->album)->get();
            $song->albumInfo = $albumInfo;
        }
        // ->all()
        return $songs;
    }

    public function song($song){
        $songInfo = Song::where('song_url', $song)->firstOrFail();
        $albumInfo = Album::where('album_name', $songInfo->album)->get();
        $songInfo->albumInfo = $albumInfo;
        return $songInfo;
    }
}