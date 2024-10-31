<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tabela;

class TabelaSeeder extends Seeder
{
    public function run(): void
    {
        Tabela::create([
            'tempo' => 15,
            'preco' => 3.00,
            'id_classe' => 1,
        ]);
    }
}
