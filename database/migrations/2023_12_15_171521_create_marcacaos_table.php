<?php

use App\Models\Atividade;
use App\Models\Cliente;
use App\Models\Personal;
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
        Schema::create('marcacaos', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->time('hora');
            $table->foreignIdFor(Atividade::class)->constrained();
            $table->foreignIdFor(Personal::class)->constrained();
            $table->foreignIdFor(Cliente::class)->constrained();
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
