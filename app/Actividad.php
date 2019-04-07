<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Actividad extends Model
{
    //
    protected $table = 'actividades';

    protected $fillable = [
    	'nombre', 
    	'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'lugar'
    	/*'lugar',
    	'estado',
    	'visibilidad',

    	'limiteInscripciones',
    	'mensajeInscripciones'*/
    ];

    function creador () 
    {
        return $this->belongsTo('App\Usuario','id_creador');
    }

    function auditoria () 
    {
        return $this->hasMany('App\Auditoria','id_actividad');
    }

    function getCuandoAttribute () 
    {
        $fecha_i = new \DateTime($this->fecha_inicio);
        return $fecha_i->format("d/m/Y H:i");
    }

    function getDuracionEnDiasAttribute () 
    {
        $fecha = new \DateTime($this->fecha_inicio);

        $dif = $fecha->diff(new \DateTime($this->fecha_fin));

        return $dif->days;
    }

    function getDuracionEnHorasAttribute () 
    {
        $fecha = new \DateTime($this->fecha_inicio);

        $dif = $fecha->diff(new \DateTime($this->fecha_fin));

        return $dif->h;
    }

    function getInicioAttribute()
    {
        $fecha = new \DateTime($this->fecha_inicio);

        return $fecha->format('Y-m-d');
    }

    function getFinAttribute()
    {
        $fecha = new \DateTime($this->fecha_fin);

        return $fecha->format('Y-m-d');
    }

    function getResumenAttribute ()
    {
        return \Str::words($this->descripcion,10);
    }

    public function path_publico()
    {
        return '/actividades/' . $this->id;
    }

    public function path_admin()
    {
        return '/admin/actividades/' . $this->id;
    }

    public function inscriptos()
    {
        return $this->hasMany(Inscripcion::class,'id_actividad');
    }

    public function inscribir($usuario)
    {
        return $this->inscriptos()->create([ 'id_actividad' => $this->id, 'id_usuario' => $usuario->id ]);
    }

}
