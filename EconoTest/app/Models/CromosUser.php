<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CromosUser extends Model
{
    use HasFactory;
        protected $fillable = [
        'estado', 'cromo_id', 'album_id'
    ];
}
