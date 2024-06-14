<?php

use App\Models\{Atividade, AtividadePersonal, Cliente, Personal};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marcacaos', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->time('hora');
            $table->foreignIdFor(Cliente::class)->constrained();
            $table->foreignIdFor(AtividadePersonal::class)->nullable()->constrained();
            $table->enum('estado', ['aceite', 'recusada', 'cancelada', 'pendente'])->default('pendente');
            $table->string('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcacaos');
    }
};
