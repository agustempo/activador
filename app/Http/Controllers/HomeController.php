<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function actividades()
    {
        $actividades = Actividad::all();

        return view('actividades', compact('actividades'));
    }

    public function actividad(Actividad $actividad)
    {

        return view('actividad', compact('actividad'));
    }

    public function notificaciones()
    {
        return view('notificaciones');
    }
}
