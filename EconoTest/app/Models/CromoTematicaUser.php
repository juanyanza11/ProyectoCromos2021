<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CromoTematicaUser extends Model
{
    use HasFactory;

    protected $table = 'cromo_tematica_user';

    public function cromo(){
       return $this->belongsTo(Cromo::class); 
    }
}
