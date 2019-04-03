<?php

namespace App\Policies;

use App\Usuario;
use App\Actividades;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActividadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the actividades.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividades  $actividades
     * @return mixed
     */
    public function view(Usuario $user, Actividades $actividades)
    {
        //
    }

    /**
     * Determine whether the user can create actividades.
     *
     * @param  \App\Usuario  $user
     * @return mixed
     */
    public function create(Usuario $user)
    {
        //
    }

    /**
     * Determine whether the user can update the actividades.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividades  $actividades
     * @return mixed
     */
    public function update(Usuario $user, Actividades $actividades)
    {
        //
    }

    /**
     * Determine whether the user can delete the actividades.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividades  $actividades
     * @return mixed
     */
    public function delete(Usuario $user, Actividades $actividades)
    {
        //
    }

    /**
     * Determine whether the user can restore the actividades.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividades  $actividades
     * @return mixed
     */
    public function restore(Usuario $user, Actividades $actividades)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the actividades.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Actividades  $actividades
     * @return mixed
     */
    public function forceDelete(Usuario $user, Actividades $actividades)
    {
        //
    }
}
