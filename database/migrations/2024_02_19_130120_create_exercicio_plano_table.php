<?php

use App\Models\Exercicio;
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
        Schema::create('exercicio_plano', function (Blueprint $table) {
            $table->foreignIdFor(Exercicio::class)->constrained();
            $table->foreignIdFor(Plano::class)->constrained();
            $table->string('repeticoes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercicio_plano');
    }
};
