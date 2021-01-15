<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cromo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion','imagen', 'estado', 'album_id'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }
}
