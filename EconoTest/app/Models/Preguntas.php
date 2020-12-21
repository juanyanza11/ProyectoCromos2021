<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    protected $fillable = [
        'idTematica','enunciado', 'respuesta','alternativa1', 'alternativa2', 'alternativa3'
    ];
}
