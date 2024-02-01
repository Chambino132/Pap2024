<?php

use App\Models\{Cliente, Personal};
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
            $table->foreignIdFor(Personal::class)->constrained();
            $table->foreignIdFor(Cliente::class)->constrained();
            $table->enum('estado', ['aceite', 'recusado', 'cancelado', 'pendente'])->default('pendente');
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
