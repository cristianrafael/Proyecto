<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        		[
					"name" => "Administrador",
					"email" => "admin@example.org",
					"email_verified_at" => now(),
					"password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
					"remember_token" => Str::random(10),
					"admin" => true
				]);
    }
}
