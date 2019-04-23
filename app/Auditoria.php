<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
    	'cambios' => 'array'
    ];

    public function actividad()
    {
    	return $this->belongsTo('App\Actividad', 'id_actividad');
    }

    public function objeto()
    {
    	return $this->morphTo('objeto', 'tipo_objeto', 'id_objeto');
    }

    public function usuario()
    {
    	return $this->belongsTo('App\Usuario', 'id_usuario');
    }
}
