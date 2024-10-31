<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classe;

class ClasseSeeder extends Seeder
{
    public function run(): void
    {
        Classe::create([
            'classe' => 'bicicleta']);
        Classe::create([
            'classe' => 'moto']);
        Classe::create([
            'classe' => 'carro']);      
        Classe::create([
            'classe' => 'van']);   
        Classe::create([
            'classe' => 'micro onibus']);  
        Classe::create([
            'classe' => 'onibus']); 
        Classe::create([
            'classe' => 'caminhao']); 
        Classe::create([
            'classe' => 'carreta']);      
        Classe::create([
            'classe' => 'maquina pesada']);    
    }
}
