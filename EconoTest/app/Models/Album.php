<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
      protected $fillable = [
          'nombre','descripcion','imagen',
        ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relacion muchos a muchos
    public function tematicas(){
        return $this->belongsToMany(Tematica::class);
    }
}
