<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            EixosSeeder::class,
            NivelsSeeder::class,
            CursosSeeder::class,
            TurmasSeeder::class,
            UsersSeeder::class,
            AlunosSeeder::class,
            CategoriasSeeder::class,
        ]); 
    }
}
