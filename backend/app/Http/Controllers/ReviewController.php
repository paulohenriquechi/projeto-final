<?php

namespace App\Http\Controllers;

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
}
