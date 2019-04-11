<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Actividad;
use App\Usuario;
use App\Inscripcion;

class InscripcionesController extends Controller
{

    public function index(Actividad $actividad)
    {
        $this->authorize('update', $actividad);

        $usuarios = Usuario::all();

        return view("admin.actividades.inscriptos", compact('actividad', 'usuarios'));
    }

    public function create()
    {
        //
    }

    public function store(Actividad $actividad)
    {

        $this->authorize('update', $actividad);

        $atributos = $this->validate(request(), [
            'id_usuario' => [
                'required',
                'exists:usuarios,id',
                'unique' => Rule::unique('inscripciones')->where(function ($query) use ($actividad) { return $query->where('id_actividad', $actividad->id); }) ]
                
        ],
        [
            'unique' => 'El usuario ya está inscripto en la actividad.',
            'exists' => 'El usuario no existe en el sistema.'
        ]);

        $usuario = Usuario::find($atributos['id_usuario']);

        $actividad->inscribir($usuario);

        return redirect($actividad->path_admin() . '/inscripciones');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Inscripcion $inscripcion)
    {
        $this->authorize('update', $inscripcion->actividad); 

        if(request()->has('confirmar'))
            $inscripcion->update(['confirmada' => request('confirmar')==true ]);

        return redirect($inscripcion->actividad->path_admin() . '/inscripciones');
    }

    public function destroy(Inscripcion $inscripcion)
    {

        $this->authorize('update', $inscripcion->actividad); 

        $inscripcion->delete();

        return redirect($inscripcion->actividad->path_admin() . '/inscripciones');
    }
}
