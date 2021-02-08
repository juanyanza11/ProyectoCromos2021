<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumsUser;
use App\Models\Cromo;
use App\Models\CromosTematica;
use App\Models\CromosUser;
use App\Models\CromoTematicaUser;
use App\Models\Tematica;
use App\Models\User;
use App\Models\UsersAlbumsTematica;
use App\Models\UsersCromosTematica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::user();    
        $tematica = Tematica::find($id);
        $cromos = $tematica->cromos;
        $cromosGanadosSinColocar = CromoTematicaUser::where('tematica_id', '=', $id)->where('user_id', '=', $user->id)->where('estado', '=', 0)->get();
        $cromosGanadosColocados = CromoTematicaUser::where('tematica_id', '=', $id)->where('user_id', '=', $user->id)->where('estado', '=', 1)->get();
        $cromosColocados = [];
        foreach ($cromosGanadosColocados as $cromo) {
            array_push($cromosColocados,$cromo->cromo);
        }
        $tematica_id = $id;
        // dd([
        //     "cromos" => $cromos,
        //     "cromosGanadosSinColocar" => $cromosGanadosSinColocar,
        //     "cromosGanadosColocados" => $cromosGanadosColocados
        // ]);
        return view('album.index', compact('cromosGanadosSinColocar', 'cromosGanadosColocados' ,'cromos', 'tematica_id', 'cromosColocados', 'tematica'));

    }



    public function coleccion(){
        $user = User::find(Auth::user()->id);
        $albums = $user->albums;
        $tematicas = Tematica::all();

        return view('album.coleccion', compact('albums', 'tematicas'));
    }
}
