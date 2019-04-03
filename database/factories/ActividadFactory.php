<?php

use App\Usuario;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->sentence,
        'lugar' => $faker->address,
        'fecha_inicio' => $faker->dateTime,
        'fecha_fin' => $faker->dateTime,
        'id_creador' => function(){
            return factory(App\Usuario::class)->create()->id;
        }
        /*'estado' => true,
        'visibilidad' => true,
        'limiteInscripciones' => 0,
        'mensajeInscripciones' => $faker->sentence */
    ];
});
