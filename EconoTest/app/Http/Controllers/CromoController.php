<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Validator;
use App\Models\Cromo;
use App\Models\Tematica;
use App\Models\CromosTematica;
use Illuminate\Http\Request;


use function PHPUnit\Framework\isNull;

class CromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tematicas = Tematica::all();
        $cromos = Cromo::all();
        return view('cromos.index',compact('cromos','tematicas'));
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
            $newCromoTematica = new CromosTematica();
            $newCromoTematica->cromo_id = $cromo->id;
            $newCromoTematica->tematica_id = $request->tematica_id;
            $newCromoTematica->save();
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
        $validacionArray = array(
            'nombre'=> 'required|min:3|max:50',
            'descripcion'=> 'required',
            'album_id'=> 'required',
        );
        $imagen = $request->file('img');
        if($imagen !== null){
            $validacionArray['img'] = 'image|mimes:jpg,png,jpeg,svg|max:3000';
        }
        $validator = Validator::make($request->all(),$validacionArray);
        if($validator -> fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Error de inserción, complete los datos correctamente')
            ->withErrors($validator);
        }else{
            $cromo->nombre = $request->nombre;
            $cromo->descripcion = $request->descripcion;
            $cromo->album_id = $request->album_id;
            if($imagen !== null){
                $rand = rand(0,100);
                $nombre_imagen = Str::lower($imagen->getClientOriginalName());
                $nombre = "0{$rand}{$nombre_imagen}";
                $destino = public_path('img/cromos');
                $request->img->move($destino, $nombre);
                $cromo->imagen = $nombre;
            }

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
        $cromo->delete();

        return redirect()->route('cromos.index')
            ->with('eliminado','Cromo borrado exitosamente');
            
    }
}
