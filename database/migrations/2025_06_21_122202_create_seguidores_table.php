<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->foreignId('seguido_id')->constrained('users')->cascadeOnDelete(); // Quem é seguido
            $table->foreignId('seguidor_id')->constrained('users')->cascadeOnDelete(); // Quem segue
            $table->timestamps();

            $table->primary(['seguido_id', 'seguidor_id']); // Chave primária composta
            $table->index(['seguido_id', 'seguidor_id']); // Índice para ordenar por data de criação
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguidores');
    }
};
