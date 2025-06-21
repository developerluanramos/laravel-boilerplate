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
        Schema::create('assinaturas', function (Blueprint $table) {
            $table->foreignId('assinado_id')->constrained('users')->cascadeOnDelete(); // Criador do conteúdo
            $table->foreignId('assinante_id')->constrained('users')->cascadeOnDelete(); // Quem assina
            $table->timestamp('data_expiracao')->nullable(); // Validade da assinatura
            $table->boolean('ativa')->default(true);
            $table->timestamps();

            $table->primary(['assinado_id', 'assinante_id']);
            $table->index(['assinado_id', 'assinante_id', 'ativa']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assinaturas');
    }
};
