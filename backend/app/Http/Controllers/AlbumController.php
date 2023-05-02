<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Review;
use App\Models\Song;
use App\Models\User;
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
        foreach($reviews as $review){
            $user = User::where('id', $review->user_id)->firstOrFail();
            $review->username = $user->username;
            $review->user_picture = $user->picture;
        }
        $albumInfo->reviews = $reviews;
        return $albumInfo;
    }

}
