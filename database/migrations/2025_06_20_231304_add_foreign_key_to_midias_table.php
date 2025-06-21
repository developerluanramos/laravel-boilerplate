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
        Schema::table('midias', function (Blueprint $table) {
            if (!Schema::hasColumn('midias', 'postagem_id')) {
                $table->foreignId('postagem_id')->after('id');
            }

            // Adiciona a foreign key com integridade referencial
            $table->foreign('postagem_id')
                ->references('id')
                ->on('postagens')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('midias', function (Blueprint $table) {
            $table->dropForeign(['postagem_id']);
        });
    }
};
