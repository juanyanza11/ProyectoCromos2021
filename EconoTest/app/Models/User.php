<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pais',
        'ciudad',
        'descripcion',
        'imagen',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo ('\App\Models\Role');
    }

    public function esAdmin(){
        if ($this->role->nombre_rol == 'administrador'){
            return true;
        }   
        return false;
    }
    public function esUsuario(){
        if ($this->role->nombre_rol == 'estudiante'){
            return true;
        }   
        return false;
    }

     public function albums($tematica_id = null){
        if($tematica_id === null){
            return $this->belongsToMany(Album::class,'album_tematica_user')->withPivot('tematica_id');
        }else{
            return $this->belongsToMany(Album::class,'album_tematica_user')
            ->where('tematica_id', '=', $tematica_id)->get();
        }   
    }



    public function cromos($cromo_id,$tematica_id){
        return $this->belongsToMany(Cromo::class,'cromo_tematica_user')
            ->where('tematica_id', '=', $tematica_id)->where('cromo_id', '=', $cromo_id)->get();
    }
}
