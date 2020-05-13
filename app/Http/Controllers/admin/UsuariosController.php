<?php

namespace App\Http\Controllers\admin;

use App\usuario;
use App\Http\Controllers\Controller;
use App\Notifications\ActividadEliminada;
use App\Notifications\ActividadModificada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            'password' => 'required',
            'email_verified_at' => 'required',
            'email' => 'required',
        ]);
        
        //si fechas en formato datetime-local
        $atributos['email_verified_at'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['email_verified_at']);

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
            'password' => 'required',
            'email' => 'required',
            'email_verified_at' => ''
        ]);

        //si fechas en formato datetime-local
        $atributos['email_verified_at'] = preg_replace('/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/', '$1-$2-$3 $4:$5:00', $atributos['email_verified_at']);
        
        return redirect()->to('admin/usuarios/'.$usuario->id); 
    }

    public function destroy(usuario $usuario)
    {

        $usuario->delete();

        return redirect('/admin/usuarios');
    }
}
