<?php

namespace App\Http\Controllers;


use App\Models\Tematica;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{

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
        return view('cuestionario.index', compact('preguntas'));
    }

    public function validarPreguntas(Request $request){
        $request_data = $request->all();
        $total_preguntas = (count($request_data) - 1) / 2;
        $preguntas_keys = array_keys($request_data);
        unset($preguntas_keys[0]);
        $correctas = 0;
        for ($i = 1; $i < count($request_data); $i++){
            if($i >= 2){
                $key = $preguntas_keys[$i];
                $key_response = $preguntas_keys[$i - 1];
                if($request_data[$key] == $request_data[$key_response]){
                    $correctas++;
                }
            }
        }
        $erroneas = $total_preguntas - $correctas;
        echo "Respuesta correctas {$correctas}";
        echo "Erroneas {$erroneas}";
    }
}
