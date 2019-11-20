<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Ciudad;
use App\Candidato;
use App\User;

$factory->define(Candidato::class, function (Faker $faker) {

	$ciudad = Ciudad::select('id','estado_id')->find($faker->numberBetween(1,2457));

	$name = $faker->name;

	$user = User::create([
							'name' => $name,
					        'email' => $faker->unique()->safeEmail,
					        'email_verified_at' => now(),
					        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
					        'remember_token' => Str::random(10)]);
    return [
    	'user_id' => $user->id,
        'nombre'  => $name,
        'edad'    => $faker->numberBetween(18,50),
        'genero'  => $faker->numberBetween(0,1) ? 'Hombre' : 'Mujer',
        'estado_id' => $ciudad->estado_id,
        'ciudad_id' => $ciudad->id,
        'estado_civil' => $faker->numberBetween(0,1) ? 'Soltero' : 'Casado',
        'telefono' => $faker->phoneNumber(),
        'descripcion_personal' => $faker->paragraph(),
        'descripcion_profesional' => $faker->paragraph()
    ];
});