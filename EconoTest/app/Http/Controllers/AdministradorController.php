<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function __construct(){
        $this->middleware('EsAdmin');
    }

    public function index(){
        return view('admin');

    }

    public function indexUsuarios(){
    return view('usuarios');  
    }
    public function indexPreguntas(){
    return view('preguntas');  
    }
    public function indexCromos(){
    return view('cromos');  
    }
}
