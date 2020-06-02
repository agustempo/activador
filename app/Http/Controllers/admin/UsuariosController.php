<?php

namespace App\Http\Controllers\admin;

use App\usuario;
use App\Http\Controllers\Controller;
use App\Notifications\ActividadEliminada;
use App\Notifications\ActividadModificada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

}
