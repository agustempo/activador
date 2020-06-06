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

//Navegación invitados
Route::get('/','HomeController@actividades');
Route::get('/actividades','HomeController@actividades');
Route::get('/actividades/{actividad}','HomeController@actividad');
Route::get('/idioma/prueba', function () {
    return view('idioma_prueba');
});
Route::get('/idioma/{locale}', function ($locale) {
    session(['locale' => $locale ]);
    return redirect()->back();
});


//Navegación para usuarios autenticados
Route::middleware('auth')->group(function (){
    //inscripciones
    Route::get('/inscripciones','InscripcionesController@index');
    Route::post('/actividades/{actividad}/inscripciones','InscripcionesController@store');
    Route::delete('/inscripciones/{inscripcion}','InscripcionesController@destroy');

    //notificaciones
    Route::get('/notificaciones','HomeController@notificaciones');

    //evaluaciones
    Route::get('/evaluaciones','EvaluacionesController@index');
    Route::get('/actividades/{actividad}/evaluaciones','EvaluacionesController@show');
    Route::post('/actividades/{actividad}/evaluaciones','EvaluacionesController@store');
    Route::patch('/actividades/{actividad}/evaluaciones/{evaluacion}','EvaluacionesController@update');
    Route::delete('/actividades/{actividad}/evaluaciones/{evaluacion}','EvaluacionesController@destroy');
});

//Navegación para administrar
Route::middleware('auth')->prefix('/admin')->group(function (){

    //actividades
    Route::get('/','admin\ActividadesController@index');
    Route::get('/actividades','admin\ActividadesController@index');
    Route::get('/actividades/create','admin\ActividadesController@create');
    Route::get('/actividades/{actividad}','admin\ActividadesController@show');
    Route::get('/actividades/{actividad}/edit','admin\ActividadesController@edit');
    Route::post('/actividades','admin\ActividadesController@store');
    Route::patch('/actividades/{actividad}','admin\ActividadesController@update');
    Route::delete('/actividades/{actividad}','admin\ActividadesController@destroy');

    Route::get('/actividades_invitado','admin\ActividadesController@indexInvitado');
    Route::get('/actividades_creadas','admin\ActividadesController@indexCreadas');

    // usuarios
    Route::get('/usuarios','admin\UsuariosController@index');
    Route::get('usuarios/data-table', 'admin\UsuariosController@indexdos')->name('usuarios.table');
    Route::get('/usuarios/create','admin\UsuariosController@create');
    Route::post('/usuarios','admin\UsuariosController@store');
    Route::get('/usuarios/{usuario}','admin\UsuariosController@show');
    Route::get('/usuarios/{usuario}/edit','admin\UsuariosController@edit');
    Route::patch('/usuarios/{usuario}','admin\UsuariosController@update');
    Route::delete('/usuarios/{usuario}','admin\UsuariosController@destroy');

    Route::get('/usuarios/{usuario}/cv','admin\UsuariosController@CV');
    Route::post('/usuarios/{usuario}/cv','admin\UsuariosController@cv_store')->name('CV.store');

    



    //inscripciones
    Route::get('/actividades/{actividad}/inscripciones','admin\InscripcionesController@index');
    Route::post('/actividades/{actividad}/inscripciones','admin\InscripcionesController@store');
    Route::delete('/inscripciones/{inscripcion}','admin\InscripcionesController@destroy');
    Route::patch('/inscripciones/{inscripcion}','admin\InscripcionesController@update');

    //invitaciones
    Route::post('/actividades/{actividad}/invitaciones','admin\ActividadInvitacionesController@store');
    Route::get('/actividades/{actividad}/invitaciones','admin\ActividadInvitacionesController@show');

    //evaluaciones
    Route::get('/actividades/{actividad}/evaluaciones','admin\EvaluacionesController@show');

    //auditoria
    Route::get('/actividades/{actividad}/auditoria','admin\ActividadesController@auditorias');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
