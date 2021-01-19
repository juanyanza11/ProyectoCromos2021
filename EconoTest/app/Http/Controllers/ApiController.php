<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumsTematica;
use App\Models\AlbumsUser;
use App\Models\Cromo;
use App\Models\CromosUser;
use App\Models\UsersAlbumsTematica;
use App\Models\UsersCromosTematica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function mostrarResultados(Request $request){
        $correctas = $request->score;
        $totalPreguntas = $request->totalPreguntas;
        $tematica_id = $request->tematicaId;
        $albumId = $request->albumId;
        $user_id = $request->userId;
        $minimo_pasar = intval($totalPreguntas * 0.75);
        $paso = false;
        if($correctas >= $minimo_pasar){
            $paso = true;

            // Obtener el album
            $albumTematica = AlbumsTematica::where('album_id', '=', $albumId)->where('tematica_id', '=', $tematica_id)->get();


            // Validar si tiene un album o sino creale
            $existeAlbum = UsersAlbumsTematica::where('user_id', '=' ,$user_id)->where('albums_tematica_id', '=', $albumTematica[0]->id)->get();

           

            if(count($existeAlbum) <= 0){
                // Crear el album al usuario
                $album_user = new UsersAlbumsTematica();
                $album_user->albums_tematica_id = $albumTematica[0]->id;
                $album_user->user_id = $user_id;
                $album_user->save();
            }
          
            $cromos_ganados = DB::table('cromos_tematicas')->where('tematica_id', '=', $tematica_id)->inRandomOrder()->take(3)->get();
            foreach ($cromos_ganados as $cromo){
                $existeCromo = UsersCromosTematica::where('cromos_tematica_id', '=', $cromo->id)->get();
                if(count($existeCromo) <= 0){
                    $newCromoAlbum = new UsersCromosTematica();
                    $newCromoAlbum->estado = 0;
                    $newCromoAlbum->cromos_tematica_id = $cromo->id;
                    $newCromoAlbum->user_id = $user_id;
                    $newCromoAlbum->save();
                }else{
                    // Actualizar cantidad;
                }

            }
        }



        return response()->json([
            'paso' => $paso
        ], 200);
    }


    public function actualizarEstado(Request $request){
        $cromoUser = UsersCromosTematica::find( $request->cromoId);

        // Make sure you've got the Page model
        $update = false;
        if($cromoUser) {
            $cromoUser->estado = true;
            $cromoUser->save();
            $update = true;
        }

        return response()->json([
            'update' => $update
        ], 200);

    }
}
