<?php

namespace App\Http\Controllers\admin;

use App\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class ActividadesController extends Controller
{

    public function index()
    {

        $actividades = auth()->user()->actividades_creadas()->get();

        return view('admin.actividades.index', compact('actividades'));
    }

    public function create()
    {
        
        return view('admin.actividades.create');
    }

    public function store(Request $request)
    {

        $atributos = $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);

        Auth::user()->actividades_creadas()->create($atributos);

        return redirect('/admin/actividades');
    }

    public function show(Actividad $actividad)
    {
        if(Auth::user()->isNot($actividad->creador))
            abort(403);

        return view('admin.actividades.show', compact('actividad'));
    }

    public function edit(Actividad $actividad)
    {
        
        return view('admin.actividades.edit', compact('actividad'));
    }

    public function update(Actividad $actividad)
    {

        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        
        $actividad->update(request()->all());

        return redirect('/admin/actividades');
    }

    public function destroy(Actividad $actividad)
    {
        
        $actividad->delete();

        return redirect('/admin/actividades');
    }
}
