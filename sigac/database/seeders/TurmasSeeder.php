<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmasSeeder extends Seeder
{
    public function run()
    {
        DB::table('turmas')->insert([
            ['nome' => 'TADS25', 'ano' => 2025, 'curso_id' => 1],
            ['nome' => 'ENF25', 'ano' => 2025, 'curso_id' => 2],
        ]);
    }
}
