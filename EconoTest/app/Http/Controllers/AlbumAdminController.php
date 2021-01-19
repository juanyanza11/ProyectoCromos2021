<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\AlbumsTematica;
use App\Models\Tematica;
use Validator;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class AlbumAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tematicas = Tematica::all();
        $albums = Album::all();
        return view('albumAdmin.index',compact('albums','tematicas'));

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
        // arreglar requeridos
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
            $destino = public_path('img/albums');
            $request->img->move($destino, $nombre);


            $tematica_id = $request->tematica_id;
             
            $album = Album::create([
                 'nombre' => $request->nombre,
                 'descripcion' => $request->descripcion,
                 'imagen' =>$nombre,
             ]);
            if($tematica_id !== null){
            foreach ($tematica_id as $tematica){
                $newAlbumTematica = new AlbumsTematica();
                $newAlbumTematica->album_id = $album->id;
                $newAlbumTematica->tematica_id = $tematica;
                $newAlbumTematica->save();
            }}

             
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
    public function update(Request $request, Album $album)
    {
        $album = Album::find($request->id);
        $validacionArray = array(
            'nombre'=> 'required|min:3|max:50',
            'descripcion'=> 'required',
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
                $destino = public_path('img/albums');
                $request->img->move($destino, $nombre);
                $album->imagen = $nombre;
            }

            $album->nombre = $request->nombre;
            $album->descripcion = $request->descripcion;


           /*  $tematica_id = $request->tematica_id;

            foreach ($tematica_id as $tematica){
                $newAlbumTematica = new AlbumsTematica();
                $newAlbumTematica->album_id = $album->id;
                $newAlbumTematica->tematica_id = $tematica;
                $newAlbumTematica->save();
            } */
            $album->save();
            return back()->with('Listo', 'El Album se actualizó correctamente');
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
            ->with('eliminado','Album borrado exitosamente');
    }
}
