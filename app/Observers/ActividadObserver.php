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
        \App\Auditoria::create([
            'id_actividad' => $actividad->id,
            'descripcion' => 'creada'
        ]);
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
        \App\Auditoria::create([
            'id_actividad' => $actividad->id,
            'descripcion' => 'editada'
        ]);
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
