<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $guarded = [];
    protected $table = 'inscripciones';

    function usuario()
    {
    	return $this->belongsTo(Usuario::class,'id_usuario');
    }

    function actividad()
    {
    	return $this->belongsTo(Actividad::class,'id_actividad');
    }
}
