<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'nombre','imagen'
    ];

    // Relacion muhcos a muchos
    public function albums(){
        return $this->belongsToMany(Album::class);
    }
    public function cromos(){
        return $this->belongsToMany(Cromo::class);
    }

}
