<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatuses')->insert([
            'nombre' => 'Solicitado',
        ]);
        DB::table('estatuses')->insert([
            'nombre' => 'Aceptado',
        ]);
        DB::table('estatuses')->insert([
            'nombre' => 'Resuelto',
        ]);
    }
}
