<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Evaluacion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EvaluacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return auth()->user()->evaluaciones;
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
    public function store(Request $request, Actividad $actividad)
    {
        //
        $request['id_usuario'] = auth()->user()->id;

        $atributos = $request->validate([
            'puntaje' => 'required', 
            'comentario' => '',
            'id_usuario' => [ 
                Rule::exists('inscripciones')->where(function ($query) use ($actividad) { return $query->where('id_actividad', $actividad->id); }),
                Rule::unique('evaluaciones')->where(function ($query) use ($actividad) { return $query->where('id_actividad', $actividad->id); })
            ]
        ]);   

        $actividad->evaluaciones()->create($atributos);

        return redirect("/actividades/{$actividad->id}/evaluaciones");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluaciones  $evaluaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        return view('evaluaciones', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evaluacion  $Evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evaluacion  $Evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad, Evaluacion $evaluacion)
    {
        //

        if(!auth()->user()->is($evaluacion->usuario))
            abort(403);

        $atributos = $request->validate([
            'puntaje' => 'required', 
            'comentario' => ''
        ]);   

        $evaluacion->update($atributos);

        return redirect("/actividades/{$actividad->id}/evaluaciones");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evaluacion  $Evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad, Evaluacion $evaluacion)
    {
        //
        if(!auth()->user()->is($evaluacion->usuario))
            abort(403);

        $evaluacion->delete();

        return redirect("/actividades/{$actividad->id}/evaluaciones");
    }
}
