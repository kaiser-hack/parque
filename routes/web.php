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
//esta linea llama al controlador y la ruta a usar
Route::get('/', 'EstudiantesController@index')->name('index');

//esta linea de codigo genera toda las rutas del recurso
Route::resource('estudiante', 'EstudiantesController');
//esta ruta genera la url y el controlador del recurso
Route::get ('/lista', 'EstudiantesController@lista')->name('estudiante.lista');