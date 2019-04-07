<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actividad;
use App\Inscripcion;
use App\Observers\ActividadObserver;
use App\Observers\InscripcionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Actividad::observe(ActividadObserver::class);
        Inscripcion::observe(InscripcionObserver::class);
    }
}
