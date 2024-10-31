<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabelas', function (Blueprint $table) {
            $table->id();
            $table->integer('tempo');
            $table->double('preco', 10, 2);
            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id')->on('classes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabelas');
    }
};
