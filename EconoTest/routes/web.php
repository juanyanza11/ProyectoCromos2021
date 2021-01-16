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

//rutas internas de admin/usuarios
Route::get('/admin/usuario', [App\Http\Controllers\AdministradorController::class, 'indexUsuarios'])->name("admin.index");
Route::post('/admin', [App\Http\Controllers\AdministradorController::class, 'aggUsuarios'])->name('admin.create');
Route::post('/admin/edit', [App\Http\Controllers\AdministradorController::class, 'editarUsuario']);
Route::delete('admin/{id}', [App\Http\Controllers\AdministradorController::class, 'eliminarUsuarios']);

// Dashboard route
Route::get('/admin/dashboard', [\App\Http\Controllers\AdministradorController::class, 'dashboard'])->name('admin.dashboard');

Route::resource('/admin/preguntas', "App\Http\Controllers\PreguntaController");
Route::resource('/admin/cromos', "App\Http\Controllers\CromoController");
Route::resource('/admin/tematicas', "App\Http\Controllers\TematicaController");
Route::resource('/admin/albums', "App\Http\Controllers\AlbumAdminController");



Route::get('/preguntas/{id}', [\App\Http\Controllers\PreguntaController::class, 'mostrarPreguntas'])->name('preguntas.usuario.index');
Route::post('/preguntas/quiz', [\App\Http\Controllers\PreguntaController::class, 'validarPreguntas'])->name('preguntas.usuario.quiz');


Route::get('/album/{album}', [\App\Http\Controllers\AlbumController::class, 'index'])->name('album.index');
