<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAlbumsTematica extends Model
{
    use HasFactory;
     public function albumsTematica(){
        return $this->belongsTo(AlbumsTematica::class);
    }
}
