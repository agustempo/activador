<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UsersResource
 * @package App\Http\Resources
 */
class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre'       => $this->nombre,
            'apellido'      => $this->apellido,
            'cohorte'    => $this->cohorte,
            'región' => $this->región,
            'trayectoria'    => $this->trayectoria,
            'carrera'    => $this->carrera,
        ];
    }
}