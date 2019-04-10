<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $guarded = [];
    protected $table = 'inscripciones';

    public function usuario()
    {
    	return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function actividad()
    {
    	return $this->belongsTo(Actividad::class,'id_actividad');
    }

    public function path_admin()
    {
    	return "/admin/inscripciones/{$this->id}";
    }
}
