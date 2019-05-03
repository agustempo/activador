<?php

use Faker\Generator as Faker;

$factory->define(App\Evaluacion::class, function (Faker $faker) {
    return [
        //
        'puntaje' => $faker->randomDigitNotNull,
        'comentario' => $faker->text
    ];
});
