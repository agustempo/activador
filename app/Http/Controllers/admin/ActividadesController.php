<?php

namespace App\Http\Controllers\admin;

use App\Actividad;
use App\Http\Controllers\Controller;
use App\Notifications\ActividadEliminada;
use App\Notifications\ActividadModificada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ActividadResource;




class ActividadesController extends Controller
{

    public function index($tipo)
    {

        // $actividades_mias = auth()->user()->actividades_creadas;
        // $actividades_invitado = auth()->user()->actividades_miembro;

        // $actividades = $actividades_mias->merge($actividades_invitado);

        return view('admin.actividades.index', compact('tipo'));
    }

    public function indexJson(Request $request, $tipo)
    {
        $query = Actividad::orderBy($request->column, $request->order);
        $query->where('tipo', '=', $tipo);
        $actividades = $query->paginate($request->per_page);

        return ActividadResource::collection($actividades);
    }

    public function indexInvitado()
    {

        $actividades = auth()->user()->actividades_miembro;

        return view('admin.actividades.index', compact('actividades'));
    }

    public function indexCreadas()
    {

        $actividades = auth()->user()->actividades_creadas;

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
            'organizacion' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
            'tipo' => 'required',
            'cupo' => '',
            'lugar' => '',
            'foto' => 'nullable|file|mimes:jpeg,jpg,png'
        ]);
        
        // //si fechas en formato datetime-local
        // $atributos['inicio'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['inicio']);
        // $atributos['fin'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['fin']);

        
        $actividad = Auth::user()->actividades_creadas()->create($atributos);

        if (request()->foto){
            request()->foto->store('foto');
            $actividad->update(['foto' => request()->foto->hashName()]);     
        }


        return redirect('/admin/actividades/tipo/'.$atributos['tipo']);
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
            'organizacion' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
            'lugar' => 'nullable',
            'tipo' => 'required',
            'cupo' => 'nullable',
            'foto' => 'nullable|file|mimes:jpeg,jpg,png',
        ]);

        // //si fechas en formato datetime-local
        // $atributos['inicio'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['inicio']);
        // $atributos['fin'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['fin']);
        
        $actividad->update($atributos);
        if (request()->foto){
            request()->foto->store('foto');
            $actividad->update(['foto' => request()->foto->hashName()]);     
        }

        //notificar inscriptos
        foreach ($actividad->inscriptos as $inscripto)
        {
            $inscripto->usuario->notify(new ActividadModificada($actividad));
        }

        return redirect($actividad->path_admin());
    }

    public function destroy(Actividad $actividad)
    {

        //notificar inscriptos
        foreach ($actividad->inscriptos as $inscripto)
        {
            $inscripto->usuario->notify(new ActividadEliminada($actividad));
        }

        $actividad->delete();

        return redirect('/admin/actividades/tipo/1');
    }

    public function auditorias(Actividad $actividad)
    {
        return view('admin.actividades.auditorias', compact('actividad'));
    }
}
