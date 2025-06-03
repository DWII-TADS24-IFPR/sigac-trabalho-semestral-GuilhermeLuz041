<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelsSeeder extends Seeder
{
    public function run()
    {
        DB::table('nivels')->insert([
            ['nome' => 'Técnico'],
            ['nome' => 'Superior'],
        ]);
    }
}
