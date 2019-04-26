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
            'inicio' => 'required',
            'fin' => 'required',
            'lugar' => ''
        ]);
        
        //si fechas en formato datetime-local
        $atributos['inicio'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['inicio']);
        $atributos['fin'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['fin']);

        Auth::user()->actividades_creadas()->create($atributos);

        return redirect('/admin/actividades');
    }

    public function show(Actividad $actividad)
    {
        $this->authorize('update', $actividad);

        return view('admin.actividades.show', compact('actividad'));
    }

    public function edit(Actividad $actividad)
    {
        
        return view('admin.actividades.edit', compact('actividad'));
    }

    public function update(Actividad $actividad)
    {

        $this->authorize('update', $actividad);

        $atributos = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
            'lugar' => ''
        ]);

        //si fechas en formato datetime-local
        $atributos['inicio'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['inicio']);
        $atributos['fin'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['fin']);
        
        $actividad->update($atributos);

        return redirect($actividad->path_admin());
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return redirect('/admin/actividades');
    }

    public function auditorias(Actividad $actividad)
    {
        return view('admin.actividades.auditorias', compact('actividad'));
    }
}
