<?php

namespace App\Http\Controllers;

use App\Models\CromoTematicaUser;
use App\Models\User;
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
            $user = User::find($user_id);
            $existeAlbum = $user->albums($tematica_id);
            

           

            // Validar si tiene un album o sino creale
            // $existeAlbum = UsersAlbumsTematica::where('user_id', '=' ,$user_id)->where('albums_tematica_id', '=', $albumTematica[0]->id)->get();

           
            // Obtener el album de esa tematica
            // $albumTematica = Album::firstWhere('tematica_id', $tematica_id);


            // // Validar si tiene un album o sino creale
            // $existeAlbum = AlbumsUser::where('user_id', '=' ,$user_id)->where('album_id', '=', $albumTematica->id)->get();

            if(count($existeAlbum) <= 0){
                // Crear el album al usuario
                DB::table('album_tematica_user')->insert([
                    'album_id' => $albumId,
                    'tematica_id' => $tematica_id,
                    'user_id' => $user_id
                ]);
               
                // $album_user = new UsersAlbumsTematica();
                // $album_user->albums_tematica_id = $albumTematica[0]->id;
                // $album_user->user_id = $user_id;
                // $album_user->save();
            }

            
            // Obtener 3 cromos al Alazar y guardarlos
            // $cromos_ganados = DB::table('cromos')->where('album_id', '=', $albumTematica[0]->id)->inRandomOrder()->take(3)->get();
            
            $cromos_ganados = DB::table('cromo_tematica')->where('tematica_id', '=', $tematica_id)->inRandomOrder()->take(3)->get();
//            $cromos_ganados = Cromo::all()->random()->take(3)->get();
            
            // Recorrer cromos para guardar en base de datos
            // foreach ($cromos_ganados as $cromo){
            //     $existeCromo = CromosUser::where('cromo_id', '=', $cromo->id)->where('album_id', '=' ,$albumTematica->id)->get();
            //     if(count($existeCromo) <= 0){
            //         $newCromoAlbum = new CromosUser();
            //         $newCromoAlbum->estado = 0;
            //         $newCromoAlbum->cromo_id = $cromo->id;
            //         $newCromoAlbum->album_id = $albumTematica->id;
            //         $newCromoAlbum->save();
            //     }else{
            //         // Actualizar cantidad;
            //     }

            // }

           

            foreach ($cromos_ganados as $cromo){
                $existeCromo = $user->cromos($cromo->cromo_id,$tematica_id);
            
                if(count($existeCromo) <= 0){
                    $newCromo = new CromoTematicaUser();
                    $newCromo->estado = 0;
                    $newCromo->cromo_id = $cromo->cromo_id;
                    $newCromo->tematica_id = $tematica_id;
                    $newCromo->user_id = $user_id;
                    $newCromo->save();
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
       
        $cromoUser = CromoTematicaUser::find($request->cromoId);
        // $cromoUser = UsersCromosTematica::find( $request->cromoId);
       
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
