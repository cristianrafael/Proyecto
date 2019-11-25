<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
        	"id"=>1,
        	"path"=>"photos/default.jpg",
        	"disk"=>"public",
        	"key"=>"default",
        ]);
    }
}
