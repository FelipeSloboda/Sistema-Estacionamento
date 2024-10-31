<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('acessos', function (Blueprint $table) {
            $table->id();
            $table->String('placa');
            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id')->on('classes');
            $table->String('modelo');
            $table->String('cor');
            $table->String('obs')->nullable();
            $table->dateTime('entrada');
            $table->dateTime('saida')->nullable();
            $table->time('permanencia')->nullable();
            $table->double('valor', 10, 2)->nullable();         
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('acessos');
    }
};
