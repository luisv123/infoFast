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

Route::get('/', function() {
	return view('inicio');
});

#REGISTRO

Route::get('registro/', function() {
	return view('registro');
});
Route::post('registro/', 'fastController@registro2');

#INICIO DE SESION

Route::get('logeo/', function() {
	return view('logeo');
});

Route::post('logeo/', 'fastController@logeo2');

#CONFIGURACION

Route::get('configuracion/', function() {
	session_start();
	return view('confi');
});
Route::put('configuracion/', 'fastController@configuracion');

#PUBLICACIONES

Route::get('publicaciones/', 'publicacionesController@publicaciones');
Route::post('publicaciones/crear/', 'publicacionesController@publicaciones_crear');
Route::delete('publicaciones/borrar/{id}', 'publicacionesController@publicaciones_borrar');
Route::put('publicaciones/editar/{id}', 'publicacionesController@publicaciones_editar');

#RE-FAST

Route::post('publicaciones/refast/{id}', 'publicacionesController@publicaciones_refast');

#GUARDADOS

Route::get('guardados', 'publicacionesController@guardados');
Route::post('publicaciones/guardar/{id}', 'publicacionesController@publicaciones_guardados');
Route::delete('guardados/borrar/{id}', 'publicacionesController@guardados_borrar');

#PERFIL

Route::get('perfil/{id}', 'fastController@perfil');

#BUSQUEDA

Route::post('/busqueda/', 'fastController@buscar');

#ME GUSTA

Route::get('publicaciones/like/{id}', 'opinionesController@like');

#COMENTARIO

Route::get('publicaciones/comentario/{id}', 'opinionesController@comentario');


#CERRAR SESION

Route::post('salir/', 'fastController@salir');