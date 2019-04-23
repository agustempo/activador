<?php

namespace App\Observers;

use App\Actividad;

class ActividadObserver
{
    /**
     * Handle the actividad "created" event.
     *
     * @param  \App\Actividad  $actividad
     * @return void
     */
    public function created(Actividad $actividad)
    {
        //
        $actividad->crear_auditoria("actividad_creada");
    }

    /**
     * Handle the actividad "updated" event.
     *
     * @param  \App\Actividad  $actividad
     * @return void
     */
    public function updated(Actividad $actividad)
    {
        //
        $actividad->crear_auditoria("actividad_editada");
    }

    /**
     * Handle the actividad "deleted" event.
     *
     * @param  \App\Actividad  $actividad
     * @return void
     */
    public function deleted(Actividad $actividad)
    {
        //
    }

    /**
     * Handle the actividad "restored" event.
     *
     * @param  \App\Actividad  $actividad
     * @return void
     */
    public function restored(Actividad $actividad)
    {
        //
    }

    /**
     * Handle the actividad "force deleted" event.
     *
     * @param  \App\Actividad  $actividad
     * @return void
     */
    public function forceDeleted(Actividad $actividad)
    {
        //
    }
}
