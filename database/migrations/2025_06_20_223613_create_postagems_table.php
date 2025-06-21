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
        Schema::create('postagens', function (Blueprint $table) {
            $table->id();

            // Chave estrangeira para o criador (usuário)
            $table->foreignId('criador_id')
                ->constrained('users');

            // Tipo de comercialização (enum)
            $table->enum('tipo_comercializacao',
                array_column(\App\Enums\TipoComercializacaoEnum::cases(), 'value')
            )->default(\App\Enums\TipoComercializacaoEnum::assinatura);

            // Legenda e preço
            $table->string('legenda', 2200)->nullable();
            $table->decimal('preco', 8, 2)->nullable()->comment('Preço para tipo avulso');

            // Status e visibilidade
            $table->boolean('publico')->default(false);
            $table->boolean('bloqueado')->default(false);

            // Métricas de engajamento
            $table->unsignedInteger('qtd_visualizacoes')->default(0);
            $table->unsignedInteger('qtd_curtidas')->default(0);

            // Timestamps
            $table->timestamps();

            // Index para melhor performance
            $table->index('criador_id');
            $table->index('tipo_comercializacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postagens');
    }
};
