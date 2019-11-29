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
        $this->call(VacantesSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(CandidatosSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(AsignacionesSeeder::class);
    }
}
