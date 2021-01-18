<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumsUser;
use App\Models\Cromo;
use App\Models\CromosUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function index(AlbumsUser $album)
    {
        $cromosGanadosSinColocar = CromosUser::all()->where('album_id', '=', $album->album_id)->where('estado', '=', 0);
        $cromosGanadosColocados = CromosUser::all()->where('album_id', '=', $album->album_id)->where('estado', '=', 1);
        $cromos = Cromo::all()->where('album_id', '=', $album->album_id);
        return view('album.index', compact('cromosGanadosSinColocar', 'cromosGanadosColocados' ,'cromos', 'album'));
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
        $albums = AlbumsUser::all()->where('user_id', '=', $user->id);
        return view('album.coleccion', compact('albums'));
    }
}
