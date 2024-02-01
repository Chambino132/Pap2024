<?php

use App\Models\Chat;
use App\Models\User;
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
        Schema::create('mensagems', function (Blueprint $table) {
            $table->id();
            $table->string('mensagem');
            $table->enum('estado', ['Entrege', 'Lida'])->default('Entrege');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Chat::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensagems');
    }
};
