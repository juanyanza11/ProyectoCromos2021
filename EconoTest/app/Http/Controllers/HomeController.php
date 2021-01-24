<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tematica;
use Illuminate\Http\Request;
use App\Models\AlbumsTematica;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $tematicas = Tematica::all();
        $albums = Album::all();
        return view('home', compact('user', 'tematicas'));
    }
    public function albums(){
        $albums = Album::all();
        return view('home.albums', compact('albums'));
    }

    public function albumsSinlge(Album $album){
        return view('home.albums_tematicas', compact('album'));
    }
    public function perfil(){
        $user = Auth::user();
        return view('perfil', compact('user'));
    }
}
