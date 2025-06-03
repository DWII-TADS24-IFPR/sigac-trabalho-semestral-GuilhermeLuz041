<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'nome' => 'Análise e Desenvolvimento de Sistemas',
                'sigla' => 'ADS',
                'total_horas' => 1600,
                'nivel_id' => 1,    
                'eixo_id' => 1,  
            ],
            [
                'nome' => 'Enfermagem',
                'sigla' => 'ENF',
                'total_horas' => 1800,
                'nivel_id' => 2, 
                'eixo_id' => 3,  
            ],
        ]);
    }
}
