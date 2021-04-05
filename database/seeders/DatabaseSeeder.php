<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name'=> 'Administrador',
            'Apellidos' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Administrador'),
            'Condicion' => '1',
            'id_rol'=>'1'
        ]);
    }
}