<?php

namespace App\Observers;

use App\Actividad;
use App\Auditoria;

class InvitacionesObserver
{
    /**
     * Handle the inscripcion "created" event.
     *
     * @param  \App\Actividad  $inscripcion
     * @return void
     */
    public function created(Actividad $actividad)
    {
        Auditoria::create([
            'id_actividad' => $actividad->id,
            'descripcion' => 'miembro_creado'
        ]);
    }
}
