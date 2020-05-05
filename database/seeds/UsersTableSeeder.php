<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Admin Master',
        	'email' => 'admin@adminstradores.adm',
        	'password' => bcrypt('admin@adm')
        ]);
        App\User::create([
            'name' => 'Requisita',
            'email' => 'requisita@linsper.com.br',
            'password' => bcrypt('requisita@adm')
        ]);
    }
}
