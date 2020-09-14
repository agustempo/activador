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
    private function arrayAtributos(){
        return [
                'nombre' => 'required',
                'apellido' => 'required',
                'telefono' => 'nullable',
                'reseña' => 'nullable',
                'email' => 'required',
                'cohorte' => 'required',
                'región' => 'required',
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
                'rol' => 'required',
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

        $usuario = usuario::create($atributos);

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

        if ($request->tipo == 'alumni')
            $query->whereRaw("cohorte < year(now())-2");
        else if ($request->tipo == 'pexa')
            $query->whereRaw("cohorte >= year(now())-2");
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
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
