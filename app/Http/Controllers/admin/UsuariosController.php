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
use Illuminate\Support\Facades\Storage;


class UsuariosController extends Controller
{
    private function arrayAtributos(){
        return [
                'nombre' => 'required',
                'apellido' => 'required',
                'telefono' => 'nullable',
                'reseña' => 'nullable',
                'email' => 'required',
                'email_personal' => 'nullable',
                'cohorte' => 'nullable',
                'región' => 'nullable',
                'carrera' => 'nullable',
                'lugar_trabajo' => 'nullable',
                'rol_trabajo' => 'nullable',
                'trayectoria' => 'required',
                'provincia' => 'nullable',
                'pais' => 'nullable',
                'universidad' => 'nullable',
                'intereses' => 'nullable',
                'programa' => 'nullable',
                'facebook' => 'nullable',
                'instagram' => 'nullable',
                'twitter' => 'nullable',
                'linkedin' => 'nullable',
                'rol' => 'nullable',
                'foto_perfil' => 'nullable|file|mimes:jpeg,jpg,png'
        ];


        // $atributos['password'] = Hash::make($request->password);
    }

    public function indexAlumni()
    {
        return view('admin.usuarios.index', ['tipo' => 'alumni']);
    }

    public function indexPexa()
    {
        return view('admin.usuarios.index', ['tipo' => 'pexa']);
    }

    public function indexStaff()
    {
        return view('admin.usuarios.index', ['tipo' => 'staff']);
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {

        $atributos = $this->validate($request, $this->arrayAtributos());

        if (Auth::user()->esAdmin() || (Auth::user()->id == $usuario->id)){
            $usuario = usuario::create($atributos);
            if (request()->foto_perfil){
                $request->foto_perfil->store('foto_perfil');
                $usuario->update(['foto_perfil' => $request->foto_perfil->hashName()]);               
            }
            if (is_null($usuario->password)){
                $usuario->password = bcrypt($usuario->telefono);
                $usuario->save();

            }
       }

        return redirect('/admin/usuarios/' . $usuario->id);
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
        $atributos = request()->validate(
            $this->arrayAtributos()
            );

        if (!Auth::user()->esAdmin())
            $atributos['rol'] = 'user';
        
        if (Auth::user()->esAdmin() || (Auth::user()->id == $usuario->id)){
            $usuario->update($atributos);

            if (request()->foto_perfil){
                request()->foto_perfil->store('foto_perfil');
                $usuario->update(['foto_perfil' => request()->foto_perfil->hashName()]);       
            }
        }

        return redirect()->to('admin/usuarios/'.$usuario->id); 
    }

    public function destroy(usuario $usuario)
    {   
        if (Auth::user()->esAdmin())
            $usuario->delete();

        return redirect('/admin/alumni');
    }

    public function indexJson(Request $request)
    {
        $query = Usuario::orderBy($request->column, $request->order);

        if ($request->filtro) {
            $palabras = explode(' ',$request->filtro);
            foreach ($palabras as $palabra)
                $query->whereRaw("concat(nombre, ' ', apellido, ' ', email, ' ', región, ' ',cohorte, ' ', carrera, ' ', trayectoria) like '%". $palabra ."%' ");
        }

        if ($request->tipo == 'alumni'){
            $query->whereRaw("cohorte < year(now())-1");
            $query->whereRaw("cohorte <> 0");
        } else if ($request->tipo == 'pexa')
            $query->whereRaw("cohorte >= year(now())-1");
        else if ($request->tipo == 'staff')
            $query->where('rol','admin');



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
        
        if (Auth::user()->esAdmin() || (Auth::user()->id == $usuario->id))
            $request->cv->store('cv');
            $usuario->update(['cv' => $request->cv->hashName()]);

        return redirect('/admin/usuarios/'.$usuario->id.'/cv');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","La contraseña ingresada es incorrecta");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva Password debe ser distinta a la usada");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password cambiada correctamente!");

    }
}
