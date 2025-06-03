<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nome' => 'João Silva',
                'email' => 'admin@teste.com',
                'password' => Hash::make('admin'),
                'role_id' => 1, 
            ],
            [
                'nome' => 'Maria Lima',
                'email' => 'aluno@teste.com',
                'password' => Hash::make('aluno'),
                'role_id' => 2, 
            ],
        ]);
    }
}
