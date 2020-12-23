<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ruta para ingresar a Admin
Route::get('/admin', [App\Http\Controllers\AdministradorController::class, 'index']);

//rutas internas de admin/usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\AdministradorController::class, 'indexUsuarios']);
Route::post('/admin/usuarios', [App\Http\Controllers\AdministradorController::class, 'aggUsuarios']);



Route::resource('/admin/preguntas', "App\Http\Controllers\PreguntaController");
Route::get('/admin/cromos', [App\Http\Controllers\AdministradorController::class, 'indexCromos']);

