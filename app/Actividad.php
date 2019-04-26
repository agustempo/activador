<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Actividad extends Model
{
    use GenerarAuditoria;

    protected $table = 'actividades';

    protected $fillable = [
    	'nombre', 
    	'descripcion',
        'inicio',
        'fin',
        'lugar'
    ];

    protected $dates = [ 'inicio', 'fin' ];

    protected static $eventosAuditables = ['created', 'updated'];

    function creador () 
    {
        return $this->belongsTo('App\Usuario','id_creador');
    }

    function auditoria () 
    {
        return $this
            ->hasMany('App\Auditoria', 'id_actividad')
            ->latest();
    }

    public function getInicioDatetimeLocalAttribute()
    {
        return $this->inicio->format('Y-m-d\TH:i');
    }

    public function getFinDatetimeLocalAttribute()
    {
        return $this->fin->format('Y-m-d\TH:i');
    }

    function getCuandoAttribute () 
    {
        $fecha_i = new \DateTime($this->inicio);
        return $fecha_i->format("d/m/Y H:i");
    }

    function getDuracionEnDiasAttribute () 
    {
        $fecha = new \DateTime($this->inicio);

        $dif = $fecha->diff(new \DateTime($this->fin));

        return $dif->days;
    }

    function getDuracionEnHorasAttribute () 
    {
        $fecha = new \DateTime($this->inicio);

        $dif = $fecha->diff(new \DateTime($this->fin));

        return $dif->h;
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

    public function inscribir(Usuario $usuario)
    {
        return $this->inscriptos()->create([ 'id_actividad' => $this->id, 'id_usuario' => $usuario->id ]);
    }

    public function desinscribir(Usuario $usuario)
    {
        return $this
            ->inscriptos()
            ->find([ 'id_actividad' => $this->id, 'id_usuario' => $usuario->id ])
            ->first()
            ->delete();
    }

    public function invitar(Usuario $usuario)
    {
        return $this->miembros()->attach($usuario);
    }

    public function esta_inscripto(Usuario $usuario)
    {
        if($this->inscriptos()->where([ 'id_usuario' => $usuario->id ])->count())
            return true;
        return false;
    }

    public function miembros()
    {
        return $this->belongsToMany(Usuario::class,'actividad_miembros', 'id_actividad', 'id_usuario');
    }

}
