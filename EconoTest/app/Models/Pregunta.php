<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'enunciado', 'opcion_correcta','opcion_1', 'opcion_2', 'opcion_3','tematica_id'
    ];
}
