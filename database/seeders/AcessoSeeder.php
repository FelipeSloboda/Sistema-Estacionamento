<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Acesso;

class AcessoSeeder extends Seeder
{
    public function run(): void
    {
        Acesso::create([
            'placa' => 'aaa1234',
            'id_classe' => 1,
            'modelo' => 'kaloy',
            'cor' => 'preta',
            'obs' => 'nao',
            'entrada' => '2024-10-29 15:30:00',
            'saida' => '2024-10-29 16:45:00',
            'permanencia' => '00:45:00',
            'valor' => 10,
        ]);   
    }
}
