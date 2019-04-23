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
        $inscripcion->crear_auditoria("inscripcion_creada");
    }

    /**
     * Handle the inscripcion "updated" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function updated(Inscripcion $inscripcion)
    {
        $inscripcion->crear_auditoria("inscripcion_editada");
    }
    
    /**
     * Handle the inscripcion "deleted" event.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return void
     */
    public function deleted(Inscripcion $inscripcion)
    {
        $inscripcion->crear_auditoria("inscripcion_eliminada");
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
