<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UsersResource
 * @package App\Http\Resources
 */
class ActividadResource extends JsonResource
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
            'organizacion'      => $this->organizacion,
            'fin'    => $this->fin->format('d-m-Y H:i'),
            'lugar' => $this->lugar,
        ];
    }
}