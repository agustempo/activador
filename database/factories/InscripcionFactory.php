<?php

use App\Usuario;
use App\Actividad;
use Faker\Generator as Faker;

$factory->define(App\Inscripcion::class, function (Faker $faker) {
    return [
        'id_actividad' => factory('App\Actividad')->create(),
        'id_usuario' => factory('App\Usuario')->create(),
        'confirmada' => false
    ];
});
