<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ["album", "user_id", "review", "rating"];

    public function album(){
        return $this->belongsTo(Album::class, "album", "album_name");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
