<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // EXECUTA TODOS OS SEEDERS FEITOS
        $this->call([
            UsersSeeder::class,
            ClasseSeeder::class,
            ServicoSeeder::class,
            VagaSeeder::class,
            TabelaSeeder::class,
            MensalistaSeeder::class,
            AcessoSeeder::class,
        ]);
    }
}
