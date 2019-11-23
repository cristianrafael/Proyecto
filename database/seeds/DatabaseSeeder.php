<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(CandidatosSeeder::class);
    }
}
