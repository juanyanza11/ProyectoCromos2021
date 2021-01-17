<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumsUser;
use App\Models\Cromo;
use App\Models\CromosUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function mostrarResultados(Request $request){
        $correctas = $request->score;
        $totalPreguntas = $request->totalPreguntas;
        $tematica_id = $request->tematicaId;
        $user_id = $request->userId;
        $minimo_pasar = intval($totalPreguntas * 0.75);


        $paso = false;
        if($correctas >= $minimo_pasar){
            $paso = true;
            // Obtener el album de esa tematica
            $albumTematica = Album::firstWhere('tematica_id', $tematica_id);

            // Validar si tiene un album o sino creale
            $existeAlbum = AlbumsUser::where('user_id', '=' ,$user_id)->where('album_id', '=', $albumTematica->id)->get();

            if(count($existeAlbum) <= 0){
                // Crear el album al usuario
                $album_user = new AlbumsUser();
                $album_user->album_id = $albumTematica->id;
                $album_user->user_id = $user_id;
                $album_user->save();
            }

            // Obtener 3 cromos al Alazar y guardarlos
            $cromos_ganados = Cromo::all()->random()->take(3)->get();

            // Recorrer cromos para guardar en base de datos
            foreach ($cromos_ganados as $cromo){
                $newCromoAlbum = new CromosUser();
                $newCromoAlbum->estado = 0;
                $newCromoAlbum->cromo_id = $cromo->id;
                $newCromoAlbum->album_id = $albumTematica->id;
                $newCromoAlbum->save();
            }
        }



        return response()->json([
            'paso' => $paso,
        ], 200);
    }
}
