<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        Servico::create([
            'descricao' => 'lavagem completa',
            'preco' => '10.00',
            'id_classe' => '1',
        ]);    
    }
}
