<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mensalista;

class MensalistaSeeder extends Seeder
{
    public function run(): void
    {
        Mensalista::create([
            'placa' => 'aaa-1234',
            'nome' => 'felipe',
            'sobrenome' => 'sloboda',
            'telefone' => '41995381266',
            'email' => 'felipe.ti.sloboda@gmail.com',
            'status' => 'ativo',
            'id_classe' => 1,
        ]);
    }
}
