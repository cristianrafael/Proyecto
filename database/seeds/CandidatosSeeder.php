<?php

use Illuminate\Database\Seeder;

class CandidatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Candidato::class, 20)->create();
    }
}
