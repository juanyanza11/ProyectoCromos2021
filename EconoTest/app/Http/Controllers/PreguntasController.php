<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Preguntas::latest()->paginate(5);
    
        return view('preguntas.index',compact('preguntas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preguntas.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'enunciado' => 'required',
            'respuesta' => 'required',
        ]);
    
        Preguntas::create($request->all());
     
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta ingresada correctamente.');
    }
          
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Preguntas $pregunta)
    {
        return view('preguntas.edit',compact('pregunta'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preguntas $pregunta)
    {
        $request->validate([
            'enunciado' => 'required',
            'respuesta' => 'required',
        ]);
    
        $pregunta->update($request->all());
    
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta actualizada exitosamente');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preguntas $pregunta)
    {
        $pregunta->delete();
    
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta borrada exitosamente');
    }
}
