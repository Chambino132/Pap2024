<?php

use App\Models\Cliente;
use App\Models\Plano;
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
        Schema::create('cliente_plano', function (Blueprint $table) {
            $table->foreignIdFor(Cliente::class)->constrained();
            $table->foreignIdFor(Plano::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_plano');
    }
};
