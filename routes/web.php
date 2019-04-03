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

    Route::get('/actividades','admin\ActividadesController@index');
    Route::get('/actividades/create','admin\ActividadesController@create');
    Route::get('/actividades/{actividad}','admin\ActividadesController@show');
    Route::get('/actividades/{actividad}/edit','admin\ActividadesController@edit');
    Route::post('/actividades','admin\ActividadesController@store');
    Route::patch('/actividades/{actividad}','admin\ActividadesController@update');
    Route::delete('/actividades/{actividad}','admin\ActividadesController@destroy');

    Route::post('/actividades/{actividad}/inscripcion','admin\InscripcionesController@store');
    Route::delete('/actividades/{actividad}/inscripcion/{inscripcion}','admin\InscripcionesController@destroy');
    Route::patch('/actividades/{actividad}/inscripcion/{inscripcion}','admin\InscripcionesController@update');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
