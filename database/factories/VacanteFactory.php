<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vacante;
use Faker\Generator as Faker;

$factory->define(Vacante::class, function (Faker $faker)
{
    return [
    	'titulo' => $faker->jobTitle,
    	'sueldo' => '$ '.$faker->numberBetween(4000,50000),
    	'ubicacion' => $faker->cityPrefix,
    	'descripcion_puesto' => $faker->text,
    	'no_vacantes' => $faker->numberBetween(1,10),
    	'horario' => $faker->dayOfWeek(),
    	'experiencia'=> $faker->numberBetween(1,3).' años',
    	'dis_viajar' => $faker->numberBetween(0,1),
    	'dis_reubicarse' => $faker->numberBetween(0,1)
    ];
});
