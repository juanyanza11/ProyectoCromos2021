<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Cromo;
use Illuminate\Http\Request;

class CromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cromos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
        'nombre'=> 'required|min:3|max:50',
        'descripcion'=> 'required',
        'img'=> 'required|image|mimes:jpg,png,jpeg,svg|max:3000',
        ]);
        if($validator -> fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Error de inserción, complete los datos correctamente')
            ->withErrors($validator);
        }else{
            $imagen = $request->file('img');
            $nombre = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('img/cromos');
            $request->img->move($destino, $nombre);

            $cromo = Cromo::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' =>$nombre,

            ]);
        return back()->with('Listo', 'Se ha insertado correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cromo  $cromo
     * @return \Illuminate\Http\Response
     */
    public function show(Cromo $cromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cromo  $cromo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cromo $cromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cromo  $cromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cromo $cromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cromo  $cromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cromo $cromo)
    {
        //
    }
}
