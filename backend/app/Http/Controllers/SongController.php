<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function songs(){
        $songs = Song::all();
        return $songs;
    }

    public function song($song){
        $song = Song::where('song_url', $song)->firstOrFail();
        return $song;
    }
}
