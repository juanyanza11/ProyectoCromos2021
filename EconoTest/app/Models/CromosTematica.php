<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CromosTematica extends Model
{
    use HasFactory;
    
    public function cromo(){
        return $this->belongsTo(Cromo::class);
    }

    public function tematica(){
        return $this->belongsTo(Tematica::class);
    }
}
