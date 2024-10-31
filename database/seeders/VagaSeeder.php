<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaga;

class VagaSeeder extends Seeder
{
    public function run(): void
    {
        Vaga::create([
            'qtd_vagas' => 100,
            'id_classe' => '1',
        ]);
    }
}
