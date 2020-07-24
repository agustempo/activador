<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'email', 'telefono', 'cohorte',
        'región', 'carrera', 'lugar_trabajo', 'rol_trabajo',
        'trayectoria', 'reseña', 'cv', 
        'provincia', 'pais', 'universidad','intereses',
        'programa', 'facebook', 'instagram','twitter','linkedin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . " " . $this->apellido;
    }

    public function actividades_creadas()
    {
        return $this->hasMany(Actividad::class,'id_creador');
    }

    public function actividades_miembro()
    {
        return $this->belongsToMany('App\Actividad', 'actividad_miembros', 'id_usuario', 'id_actividad');
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class,'id_usuario');
    }
    public function path_admin()
    {
        return '/admin/usuarios/' . $this->id;
    }
}
