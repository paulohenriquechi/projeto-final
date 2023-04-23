<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function setReview(Request $request){
        $review = $request->validate([
            'album' => 'required',
            'user_id' => 'required',
            'review' => 'required|min:3|max:1000',
            'rating' => 'required'
        ]);

        $review = Review::create([
            "album" => $review["album"],
            "user_id" => $review["user_id"],
            "review" => $review["review"],
            "rating" => $review["rating"]
        ]);
        return $review;
    }

    function getReviews($album){
        return Review::orderBy('updated_at', 'desc')->where('album', $album)->get();
    }

    function getUserReviews($id){
        $userReviews = Review::orderBy('updated_at', 'desc')->where('user_id', $id)->get();
        foreach($userReviews as $review){
            $albumCover = Album::where('album_name', $review->album)->firstOrFail();
            $review->album_cover = $albumCover->album_cover;
        }
        return $userReviews;
        // return response()->json(["reviews" => $userReviews]);
    }
}
