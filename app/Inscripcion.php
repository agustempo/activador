<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use GenerarAuditoria;

    protected $guarded = [];
    protected $table = 'inscripciones';

    protected $attributes = [
        'confirma' => false,
        'presente' => false
    ];

    protected static $eventosAuditables = ['created', 'updated', 'deleted'];

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

    public function path_publico()
    {
        return "/inscripciones/{$this->id}";
    }

}
