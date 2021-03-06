<?php

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

Route::get('/', function () {
    return redirect('/inicio');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', 'PublicacionController@index')->name('inicio');

Route::post('/inicio', 'PublicacionController@store')->middleware('admin')->name('publicar');

Route::get('/detalle/{id}', 'PublicacionController@show')->name('mostrar');

Route::post('/detalle', 'ComentarioController@store')->middleware('auth')->name('comentar');

Route::get('/publicacion/editar/{id}', 'PublicacionController@edit')->middleware('admin');

Route::post('/publicacion/editar', 'PublicacionController@update')->middleware('admin')->name('editar');

Route::get('/publicacion/eliminar/{id}', 'PublicacionController@destroy')->middleware('admin')->name('eliminar');