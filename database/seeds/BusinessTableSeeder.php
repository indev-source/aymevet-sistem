<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business')->insert([
            'nombre' => Str::random(10),
            'calle' => Str::random(10),
            'colonia' => bcrypt('secret'),
            'estado'=>Str::random(10),
            'ciudad'=> Str::random(10),
            'pais'=> Str::random(10),
            'numero_exterior'=> 0,
            'numero_interior'=> 164,
            'tarjeta'=>5.2
        ]);
    }
}
