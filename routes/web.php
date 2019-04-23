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

Route::get('/','HomeController@actividades');
Route::get('/actividades','HomeController@actividades');
Route::get('/actividades/{actividad}','HomeController@actividad');

//Panel de administracion
Route::middleware('auth')->prefix('/admin')->group(function (){
//Route::prefix('/admin')->group(function (){

    Route::get('/',function () { return view('prueba'); });
    Route::get('/actividades','admin\ActividadesController@index');
    Route::get('/actividades/create','admin\ActividadesController@create');
    Route::get('/actividades/{actividad}','admin\ActividadesController@show');
    Route::get('/actividades/{actividad}/edit','admin\ActividadesController@edit');
    Route::post('/actividades','admin\ActividadesController@store');
    Route::patch('/actividades/{actividad}','admin\ActividadesController@update');
    Route::delete('/actividades/{actividad}','admin\ActividadesController@destroy');

    //inscripciones
    Route::get('/actividades/{actividad}/inscripciones','admin\InscripcionesController@index');
    Route::post('/actividades/{actividad}/inscripciones','admin\InscripcionesController@store');
    Route::delete('/inscripciones/{inscripcion}','admin\InscripcionesController@destroy');
    Route::patch('/inscripciones/{inscripcion}','admin\InscripcionesController@update');

    //invitaciones
    Route::post('/actividades/{actividad}/invitaciones','admin\ActividadInvitacionesController@store');
    Route::get('/actividades/{actividad}/invitaciones','admin\ActividadInvitacionesController@show');

    //auditoria
    Route::get('/actividades/{actividad}/auditoria','admin\ActividadesController@auditorias');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
