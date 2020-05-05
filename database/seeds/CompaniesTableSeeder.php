<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Company::create([
            'name'      => 'Linsper',
            'site'      => 'linsper.com.br',
            'color'     => '#111111',
            'image'     => 'linsper.png',
        ]);
        App\Models\Company::create([
            'name'      => 'Datainfo',
            'site'      => 'datainfo.com.br',
            'color'     => '#111111',
            'image'     => 'datainfo.png',
        ]);
        App\Models\Company::create([
            'name'      => 'Eme4',
            'site'      => 'eme4.com.br',
            'color'     => '#111111',
            'image'     => 'eme4.png',
        ]);
        App\Models\Company::create([
            'name'      => 'Requisita',
            'site'      => 'requisita.com.br',
            'color'     => '#111111',
            'image'     => 'requisita.png',
        ]);
        App\Models\Company::create([
            'name'      => 'Semper',
            'site'      => 'semper.com.br',
            'color'     => '#111111',
            'image'     => 'semper.png',
        ]);
        App\Models\Company::create([
            'name'      => 'Total',
            'site'      => 'total.com.br',
            'color'     => '#111111',
            'image'     => 'total.png',
        ]);
        DB::table('phones')->insert([
            'phone'     => '4732859738',
            'company'   => 1,
        ]);
        DB::table('phones')->insert([
            'phone'     => '4733859068',
            'company'   => 1,
        ]);
        DB::table('phones')->insert([
            'phone'     => '4733710528',
            'company'   => 1,
        ]);
        DB::table('phones')->insert([
            'phone'     => '47991420183',
            'company'   => 1,
        ]);
    }
}
