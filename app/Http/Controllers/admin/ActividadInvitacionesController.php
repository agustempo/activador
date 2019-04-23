<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actividad;
use App\Usuario;
use Illuminate\Validation\Rule;

class ActividadInvitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $this->authorize('update', $actividad);

        $validado = request()->validate([
            'id_usuario' => [
                    'required',
                    'exists:usuarios,id',
                    Rule::unique('actividad_miembros')->where(function ($query) use ($actividad) {
                        return $query->where('id_actividad', $actividad->id);
                    })
                ]
        ]);

        $usuario = Usuario::find($validado['id_usuario']);

        $actividad->invitar($usuario);

        return redirect($actividad->path_admin() . '/invitaciones');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        $usuarios = Usuario::all();
        
        return view('admin.actividades.miembros', compact('actividad', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
