<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
        $cromos = \DB::table('cromos')
                ->select('cromos.id','cromos.nombre', 'cromos.descripcion', 'cromos.imagen')
                ->orderBy('cromos.id')
                ->get();
                return view('cromos.index')->with('cromos', $cromos) ;  
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
            $rand = rand(0,100);
            $nombre_imagen = Str::lower($imagen->getClientOriginalName());
            $nombre = "0{$rand}{$nombre_imagen}";
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
        $cromo = Cromo::find($request->id);
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
            $cromo->nombre = $request->nombre;
            $cromo->descripcion = $request->descripcion;
            $cromo->imagen = $request->imagen;
            
            unlink(public_path('img/cromos'.$cromo->imagen));
            
            $cromo->save();
            return back()->with('Listo', 'El cromo se actualizó correctamente');
        }
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
