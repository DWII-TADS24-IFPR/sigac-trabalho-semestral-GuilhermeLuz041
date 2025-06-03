<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EixosSeeder extends Seeder
{
    public function run()
    {
        DB::table('eixos')->insert([
            ['nome' => 'Tecnologia'],
            ['nome' => 'Ciências Humanas'],
            ['nome' => 'Saúde'],
        ]);
    }
}
