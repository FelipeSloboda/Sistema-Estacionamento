<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mensalistas', function (Blueprint $table) {
            $table->id();
            $table->String('placa');
            $table->String('nome');
            $table->String('sobrenome');
            $table->String('telefone');
            $table->String('email');
            $table->String('status');
            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id')->on('classes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensalistas');
    }
};
