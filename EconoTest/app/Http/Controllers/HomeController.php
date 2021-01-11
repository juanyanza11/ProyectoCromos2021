<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tematica;
use Illuminate\Http\Request;

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
        $album = Album::firstWhere('user_id', Auth::user()->id);
        return view('home', compact('user', 'tematicas', 'album'));
    }
}
