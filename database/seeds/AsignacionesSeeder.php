<?php

use Illuminate\Database\Seeder;

class AsignacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 200 ; $i++)
    		DB::table('asignacions')->insert(["categoria_id" => rand(1,37), "vacante_id" => rand(1,100)]);
			
    }
}
