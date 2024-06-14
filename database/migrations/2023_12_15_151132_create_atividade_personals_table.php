<?php

use App\Models\Personal;
use App\Models\Atividade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atividade_personals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Personal::class)->constrained();
            $table->foreignIdFor(Atividade::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atividade_personals');
    }
};
