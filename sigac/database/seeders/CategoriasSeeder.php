<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'nome' => 'Atividades Complementares',
                'maximo_horas' => 200,
                'curso_id' => 1,
            ],
        ]);
    }
}
