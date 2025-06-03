<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunosSeeder extends Seeder
{
    public function run()
    {
        DB::table('alunos')->insert([
            [
                'user_id' => 2, 
                'turma_id' => 1,
            ],
        ]);
    }
}
