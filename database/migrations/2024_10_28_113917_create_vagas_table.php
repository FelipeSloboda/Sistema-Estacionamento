<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->String('qtd_vagas');
            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id')->on('classes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
