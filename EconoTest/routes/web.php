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

Route::view('/', "home")->name('home');
Route::view('acerca-de', "about")->name('about');
Route::get('index', "IndexController@index")->name('index.index');

Route::get('index/{post:slug}', "IndexController@index")->name('index.show');

Route::view('contactos', "contact")->name('contact');
