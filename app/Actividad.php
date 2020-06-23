<?php

namespace App;

use App\Notifications\UsuarioInscripto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use GenerarAuditoria;

    protected $table = 'actividades';

    protected $fillable = [
    	'nombre', 
        'descripcion',
    	'organizacion',
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

    public function getInicioISOAttribute()
    {
        return $this->inicio->isoFormat("DD MM 00YYYY HH:mm");
    }

    public function getFinISOAttribute()
    {
        return $this->fin->isoFormat("DD MM 00YYYY HH:mm");
    }

    public function getNombreAttribute($value)
    {
        return ucfirst($value);
    }

    function getFechasAttribute () 
    {
        if ($this->inicio->diffInHours($this->fin) < 24)
            return $this->inicio->isoFormat("D MMM YYYY HH:mm") . " - " . $this->fin->isoFormat("HH:mm");
        else
            return $this->inicio->isoFormat("D MMM YYYY HH:mm") . " - " . $this->fin->isoFormat("D MMM YYYY HH:mm");
    }

    function getCuandoAttribute () 
    {
        return $this->inicio->isoFormat("D MMM YYYY HH:mm");
    }

    function getDuracionAttribute () 
    {
        return $this->inicio->diffForHumans($this->fin, $this->inicio::DIFF_ABSOLUTE);
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
        return $this
            ->inscriptos()
            ->create([ 'id_actividad' => $this->id, 'id_usuario' => $usuario->id ]);
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

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'id_actividad');
    }

}
