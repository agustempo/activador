<?php

namespace App\Policies;

use App\Usuario;
use App\Actividad;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActividadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the actividad.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividad  $actividad
     * @return mixed
     */
    public function view(Usuario $user, Actividad $actividad)
    {
        //
    }

    /**
     * Determine whether the user can create actividads.
     *
     * @param  \App\Usuario  $user
     * @return mixed
     */
    public function create(Usuario $user)
    {
        //
    }

    /**
     * Determine whether the user can update the actividad.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividad  $actividad
     * @return mixed
     */
    public function update(Usuario $user, Actividad $actividad)
    {
        //
        return $user->is($actividad->creador);
    }

    /**
     * Determine whether the user can delete the actividad.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividad  $actividad
     * @return mixed
     */
    public function delete(Usuario $user, Actividad $actividad)
    {
        //
    }

    /**
     * Determine whether the user can restore the actividad.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividad  $actividad
     * @return mixed
     */
    public function restore(Usuario $user, Actividad $actividad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the actividad.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividad  $actividad
     * @return mixed
     */
    public function forceDelete(Usuario $user, Actividad $actividad)
    {
        //
    }
}
