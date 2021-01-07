<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Cromo;
use App\Models\CromosUser;
use App\Models\Tematica;
use App\Models\Pregunta;
use App\Models\PreguntasOpcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class PreguntaController extends Controller
{
    public function __construct(){
            $this->middleware('EsAdmin')->except('validarPreguntas','mostrarPreguntas');
        }
    public function index()
    {
        $preguntas = Pregunta::latest()->paginate(5);
        $preguntas2 = DB::table('preguntas')
                ->join('tematicas', 'tematicas.id', '=', 'preguntas.tematica_id')
                ->select('preguntas.id','preguntas.enunciado', 'preguntas.opcion_correcta',
                'preguntas.opcion_1','preguntas.opcion_2','preguntas.opcion_3','preguntas.opcion_4',
                 'tematicas.nombre')
                ->orderBy('preguntas.id')
                ->get();

        return view('preguntas.index',compact('preguntas','preguntas2', $preguntas2))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    public function create()
    {
        $tematicas = Tematica::all();
        return view('preguntas.create', compact('tematicas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'enunciado' => 'required',
            'opcion_correcta' => 'required',
            'opcion_1' => 'required',
            'opcion_2' => 'required'
        ]);
    
        $pregunta = new Pregunta();

        $opciones = array(
            $request->input('opcion_1'),
            $request->input('opcion_2'),
            $request->input('opcion_3'),
            $request->input('opcion_correcta')
        );
        
        shuffle($opciones);

        $pregunta->enunciado = $request->input('enunciado');
        $pregunta->opcion_correcta = $request->input('opcion_correcta');
        $pregunta->opcion_1 = $opciones[0];
        $pregunta->opcion_2 = $opciones[1];
        $pregunta->opcion_3 = $opciones[2];
        $pregunta->opcion_4 = $opciones[3];
        $pregunta->tematica_id = $request->input('tematica_id');
        $pregunta->save();

        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta ingresada correctamente.');
    }
          

    public function edit(Pregunta $pregunta)
    {
        $tematicas = Tematica::all();
        return view('preguntas.edit',compact('pregunta', 'tematicas'));
    }
    

    public function update(Request $request, Pregunta $pregunta)
    {
        $request->validate([
            'enunciado' => 'required',
            'opcion_correcta' => 'required',
            'opcion_1' => 'required',
            'opcion_2' => 'required'
        ]);
    
        $pregunta->update($request->all());
    
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta actualizada exitosamente');
    }

    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();
    
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta borrada exitosamente');
    }

    public function mostrarPreguntas($id){
        $preguntas = Pregunta::all()->where('tematica_id', '=', $id);
        
        if(count($preguntas)==0){
            return redirect()->action([HomeController::class, 'index']);

        }

        return view('cuestionario.index', compact('preguntas'));
    }

    public function validarPreguntas(Request $request){
        // Obtener las preguntas desde la vista
        $request_data = $request->all();

        // Obtener el total de preguntas
        $total_preguntas = (count($request_data) - 1) / 2;

        // Obteniendo las llaves de las preguntas
        $preguntas_keys = array_keys($request_data);
        // borrar token de las claves
        unset($preguntas_keys[0]);

        $correctas = 0;

        for ($i = 1; $i < count($request_data); $i++){
            if($i % 2 == 0){
                $key = $preguntas_keys[$i];
                $key_response = $preguntas_keys[$i - 1];
                if($request_data[$key] == $request_data[$key_response]){
                    $correctas++;
                }
            }
        }

        $erroneas = $total_preguntas - $correctas;

        $minimo_pasar = intval($total_preguntas * 0.75);

        $paso = false;

        if($correctas >= $minimo_pasar){
            $paso = true;
            // Validar si tiene un album o sino creale
            $existeAlbum = Album::firstWhere('user_id', Auth::user()->id);
            $newAlbumId = null;

            if($existeAlbum == null){
                // Crear el album al usuario
                $album = new Album();
                $album->user_id = Auth::user()->id;
                $album->save();
                $newAlbumId = $album->id;
            }else{
                $newAlbumId = $existeAlbum->id;
            }

            // Obtener 3 cromos al Alazar y guardarlos
            $cromos_ganados = Cromo::all()->random()->take(3)->get();

            // Recorrer cromos para guardar en base de datos
            foreach ($cromos_ganados as $cromo){
                $newCromoAlbum = new CromosUser();
                $newCromoAlbum->estado = 0;
                $newCromoAlbum->cromo_id = $cromo->id;
                $newCromoAlbum->album_id = $newAlbumId;
                $newCromoAlbum->save();
            }
        }
        return view('cuestionario.resultado', compact('total_preguntas','correctas', 'erroneas', 'paso'));
    }

}
