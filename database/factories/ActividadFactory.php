<?php

use App\Usuario;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->paragraph,
        'organizacion' => $faker->paragraph,
        'lugar' => $faker->address,
        'inicio' => $faker->dateTime,
        'fin' => $faker->dateTime,
        'id_creador' => function(){
            return factory(App\Usuario::class)->create()->id;
        }
    ];
});
