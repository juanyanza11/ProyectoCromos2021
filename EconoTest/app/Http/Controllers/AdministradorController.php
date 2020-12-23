<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Hash;

class AdministradorController extends Controller
{
    //
    public function __construct(){
        $this->middleware('EsAdmin');
    }

    public function index(){
       return view('admin');
    }
    //metodo para debolver la vista de admin/usuarios 
    public function indexUsuarios(){
        $usuarios = \DB::table('users')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->select('users.id','users.name', 'users.email', 'roles.nombre_rol')
                ->orderBy('users.id')
                ->get();
    return view('usuarios')->with('usuarios', $usuarios) ;  
    }
    
    //metodo para agregar usuarios
    public function aggUsuarios(Request $request){

        $validator = Validator::make($request->all(),[
        'nombre'=> 'required|min:3|max:50',
        'email'=> 'required|min:6|email',
        'pass1'=> 'required|min:8|required_with:pass2|same:pass2',
        'pass2'=> 'required|min:8',
        ]);
        if($validator -> fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Error de inserción, complete los datos correctamente')
            ->withErrors($validator);
        }else{
            $usuario = User::create([
                'name' => $request->nombre,
                'email' => $request->email,
                'password' => Hash::make($request->pass1),
                'role_id' => $request->rol
            ]);
            return back()->with('Listo', 'Se ha insertado correctamente');
        }
    }
    
    public function eliminarUsuarios($id){
            $user = User::find($id);
            $user-> delete();
            return back()-> with('Listo', 'El usuario se eliminó correctamente');
        }



    public function indexPreguntas(){
    return view('preguntas');  
    }
    public function indexCromos(){
    return view('cromos');  
    }
}
