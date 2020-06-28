<?php

namespace App\Http\Controllers\admin;

use App\Usuario;
use App\Http\Controllers\Controller;
use App\Notifications\ActividadEliminada;
use App\Notifications\ActividadModificada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UsuarioResource;


class UsuariosController extends Controller
{


    public function index()
    {

        $usuarios = usuario::all();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {

        $atributos = $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'nullable',
            'email' => 'required',
            'cohorte' => 'required',
            'región' => 'required',
            'carrera' => 'nullable',
            'lugar_trabajo' => 'nullable',
            'rol_trabajo' => 'nullable',
            'trayectoria' => 'required',
            'reseña' => 'nullable',
        ]);


        // $atributos['password'] = Hash::make($request->password);
        usuario::create($atributos);

        return redirect('/admin/usuarios');
    }

    public function show(usuario $usuario)
    {
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit(usuario $usuario)
    {    
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(usuario $usuario)
    {

        $atributos = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'nullable',
            'email' => 'required',
            'cohorte' => 'required',
            'región' => 'required',
            'carrera' => 'nullable',
            'lugar_trabajo' => 'nullable',
            'rol_trabajo' => 'nullable',
            'trayectoria' => 'required',
            'reseña' => 'nullable',
        ]);

        //si fechas en formato datetime-local
        // $atributos['password'] = Hash::make($atributos['password']);
        
        $usuario->update($atributos);

        return redirect()->to('admin/usuarios/'.$usuario->id); 
    }

    public function destroy(usuario $usuario)
    {

        $usuario->delete();

        return redirect('/admin/usuarios');
    }

    public function indexJson(Request $request)
    {
        $query = Usuario::orderBy($request->column, $request->order);

        if ($request->filtro) {
            $palabras = explode(' ',$request->filtro);
            foreach ($palabras as $palabra)
                $query->whereRaw("concat(nombre, ' ', apellido, ' ', email, ' ', región, ' ', carrera, ' ', trayectoria) like '%". $palabra ."%' ");
        }

        $usuarios = $query->paginate($request->per_page);

        return UsuarioResource::collection($usuarios);
    }

    public function cv(usuario $usuario)
    {
        return view('admin.usuarios.cv', compact('usuario'));
    }

    public function cv_store(Request $request, usuario $usuario)
    {
        request()->validate([
            'cv' => 'required|file|mimes:pdf'
        ]);
        
        $request->cv->store('cv');
        $usuario->update(['cv' => $request->cv->hashName()]);

        return redirect('/admin/usuarios/'.$usuario->id.'/cv');
    }
}
