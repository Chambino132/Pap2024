<?php

use App\Models\Equipamento;
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
        Schema::create('problemas', function (Blueprint $table) {
            $table->id();
            $table->string('problema');
            $table->foreignIdFor(Equipamento::class)->constrained();
            $table->enum('estado', ['Resolvido', 'Em Progresso', 'Por Resolver'])->default('Por Resolver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problemas');
    }
};
