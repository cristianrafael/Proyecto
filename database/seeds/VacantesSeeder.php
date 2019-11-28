<?php

use Illuminate\Database\Seeder;

class VacantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vacante::class, 100)->create();
    }
}
