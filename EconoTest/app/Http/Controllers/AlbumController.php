<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumsUser;
use App\Models\Cromo;
use App\Models\CromosUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\CromosTematica;
use App\Models\UsersAlbumsTematica;
use App\Models\UsersCromosTematica;

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
    public function index(UsersAlbumsTematica  $album)
    {
       $cromos = CromosTematica::all()->where('tematica_id', '=', $album->albumsTematica->tematica_id);
        $cromosGanadosSinColocar = UsersCromosTematica::all()->where('user_id', '=', $album->user_id)->where('estado', '=', 0);
        $cromosGanadosColocados = UsersCromosTematica::all()->where('user_id', '=', $album->user_id)->where('estado', '=', 1);
        $tematica_id = $album->albumsTematica->tematica_id;
        return view('album.index', compact('cromosGanadosSinColocar', 'cromosGanadosColocados' ,'cromos','tematica_id'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }

    public function coleccion(){
        $user = Auth::user();
        $albums = UsersAlbumsTematica::all()->where('user_id', '=', $user->id);
        return view('album.coleccion', compact('albums'));
    }
}
