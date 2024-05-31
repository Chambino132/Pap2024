<?php

use App\Models\Cliente;
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
        Schema::create('bests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Equipamento::class)->constrained();
            $table->double('pb');
            $table->foreignIdFor(Cliente::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bests');
    }
};
