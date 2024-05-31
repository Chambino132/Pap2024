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
        Schema::create('perdidos', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('localizacao');
            $table->string('imagem')->nullable();
            $table->enum('estado', ['encontrado', 'devolvido'])->default('encontrado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perdidos');
    }
};
