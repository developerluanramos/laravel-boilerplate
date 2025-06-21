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
        Schema::create('midias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postagem_id');
            // Relacionamento com a tabela de postagens

            // Tipo de mídia (imagem, vídeo, áudio)
            $table->enum('tipo', array_column(\App\Enums\TipoMidiaEnum::cases(), 'value'))
                ->default(\App\Enums\TipoMidiaEnum::imagem);

            // URLs (obrigatório para todos os tipos)
            $table->string('url');
            $table->string('thumbnail_url')->nullable();

            // Metadados
            $table->integer('duracao')->nullable()->comment('Em segundos');
            $table->integer('ordem')->default(1);

            $table->timestamps();

            // Índices
            $table->index('postagem_id');
            $table->index('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midias');
    }
};
