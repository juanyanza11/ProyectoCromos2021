<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
     protected $fillable = [
        'nombre', 'descripcion', 'tematica_id'
    ];


    public function tematica(){
        return $this->belongsTo(Tematica::class);
    }
}
