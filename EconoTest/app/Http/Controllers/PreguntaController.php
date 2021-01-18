<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\AlbumsUser;
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
                        ->with('eliminado','Pregunta borrada exitosamente');
    }

    public function mostrarPreguntas($id){

        
        $preguntas = DB::table('preguntas')->where('tematica_id', '=', $id)->inRandomOrder()->take(8)->get();
        $tematica_id = $id;


        return response()->json(['preguntas' => $preguntas]);
    }

    
    
    
    public function validarPreguntas(Request $request)
    {
        return view('cuestionario.resultado', compact('total_preguntas','correctas', 'erroneas', 'newAlbumId', 'paso','mostrarAlerta'));
    }


    
}
