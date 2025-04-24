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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('token')->unique();
            $table->enum('role', ['secretario', 'professor', 'auxiliar', 'superintendente'])->default('professor');
            $table->timestamp('expires_at');
            $table->timestamp('registered_at')->nullable();
            $table->timestamps();

            $table->unique(['email', 'role']); // Impede convites duplicados para mesmo email+role
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
