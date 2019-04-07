<?php

namespace App\Observers;

use App\Inscripcion;
use App\Auditoria;

class InscripcionObserver
{
    /**
     * Handle the inscripcion "created" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function created(Inscripcion $inscripcion)
    {
        Auditoria::create([
            'id_actividad' => $inscripcion->actividad->id,
            'descripcion' => 'Usuario inscripto'
        ]);
    }

    /**
     * Handle the inscripcion "updated" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function updated(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Handle the inscripcion "deleted" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function deleted(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Handle the inscripcion "restored" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function restored(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Handle the inscripcion "force deleted" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function forceDeleted(Inscripcion $inscripcion)
    {
        //
    }
}
