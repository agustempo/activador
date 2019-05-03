<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'evaluaciones';
    protected $guarded = [];

    public function usuario()
    {
    	return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
