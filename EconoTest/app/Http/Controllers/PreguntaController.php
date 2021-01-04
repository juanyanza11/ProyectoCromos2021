<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{

    public function index()
    {
        $preguntas = Pregunta::latest()->paginate(5);
    
        return view('preguntas.index',compact('preguntas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    public function create()
    {
        return view('preguntas.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'enunciado' => 'required',
            'respuesta' => 'required',
            'alternativa1' => 'required'
        ]);
    
        Pregunta::create($request->all());
     
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta ingresada correctamente.');
    }
          

    public function edit(Pregunta $pregunta)
    {
        return view('preguntas.edit',compact('pregunta'));
    }
    

    public function update(Request $request, Pregunta $pregunta)
    {
        $request->validate([
            'enunciado' => 'required',
            'respuesta' => 'required',
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
}
