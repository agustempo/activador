<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Inscripcion;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inscripciones = Inscripcion::where(['id_usuario' => auth()->user()->id])->get();

        return view('inscripciones', compact('inscripciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Actividad $actividad)
    {
        Validator::make(
            ['id_usuario' => auth()->user()->id], 
            [
                'id_usuario' => Rule::unique('inscripciones')->where(function ($query) use ($actividad) { return $query->where('id_actividad', $actividad->id); })
            ])->validate();

        $actividad->inscribir(auth()->user());

        return redirect($actividad->path_publico())
            ->with('mensaje','te_inscribiste');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripcion $inscripcion)
    {
        //
        if ($inscripcion->id_usuario != auth()->user()->id)
            return abort('403');

        $inscripcion->delete();

        return redirect('/inscripciones');
    }
}
