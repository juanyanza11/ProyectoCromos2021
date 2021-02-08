<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tematica;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class AlbumAdminController extends Controller
{
    public function __construct(){
            $this->middleware('EsAdmin');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        $tematicas = Tematica::all();
        return view('admin.albums.index', compact('albums', 'tematicas'));
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
            'descripcion'=> 'required|min:3|max:250',
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
            $destino = public_path('img/albunes');
            $request->img->move($destino, $nombre);

            $album = Album::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' =>$nombre,
            ]);

            // Guardar las tematicas
            $album->tematicas()->attach($request->tematicas);
            return back()->with('Listo', 'Se ha insertado correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::find($request->id);
        $validacionArray = array(
            'nombre'=> 'required|min:3|max:50',
            'descripcion'=> 'required|min:3|max:250',

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
            $album->nombre = $request->nombre;
            $album->descripcion = $request->descripcion;
            if($imagen !== null){
                $rand = rand(0,100);
                $nombre_imagen = Str::lower($imagen->getClientOriginalName());
                $nombre = "0{$rand}{$nombre_imagen}";
                $destino = public_path('img/albunes');
                $request->img->move($destino, $nombre);
                $album->imagen = $nombre;
            }

            $album->save();

            // Borrar Tematicas
            $album->tematicas()->detach($album->tematicas);
            
            // y añadirlas denuevo
            $album->tematicas()->attach($request->tematicas);

            return back()->with('Listo', 'El cromo se actualizó correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')
        ->with('success','Album borrado exitosamente');
    }
}
