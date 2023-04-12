<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $casts = [
        'description' => 'array'
    ];

    public function songs(){
        return $this->hasMany(Song::class, 'album', 'album_name');
    }
}
