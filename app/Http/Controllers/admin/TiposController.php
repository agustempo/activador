<?php

namespace App\Http\Controllers\admin;

use App\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class tiposController extends Controller
{

    public function index()
    {
        $tipos = Tipo::limit(11)->get();

        return view('admin.tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('admin.tipos.create');
    }

    public function store()
    {

        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        Tipo::create(request()->all());

        return redirect('/admin/tipos');
    }

    public function show(Tipo $Tipo)
    {

        return view('admin.tipos.show', compact('Tipo'));
    }

    public function edit(Tipo $Tipo)
    {

        return view('admin.tipos.edit', compact('Tipo'));
    }

    public function update(Tipo $Tipo)
    {

        $Tipo->update(request()->all());

        return redirect('/admin/tipos');
    }

    public function destroy(Tipo $Tipo)
    {

        $Tipo->delete();

        return redirect('/admin/tipos');
    }
}
