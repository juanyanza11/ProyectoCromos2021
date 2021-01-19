<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumsTematica extends Model
{
    use HasFactory;

     public function album(){
        return $this->belongsTo(Album::class);
    }

    public function tematica(){
        return $this->belongsTo(Tematica::class);
    }
}
