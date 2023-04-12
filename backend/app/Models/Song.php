<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $casts = [
        'lyrics' => 'array'
    ];
    
    public function album(){
        return $this->belongsTo(Album::class, "album", "album_name");
    }
}
