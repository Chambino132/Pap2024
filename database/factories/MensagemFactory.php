<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mensagem>
 */
class MensagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estados = ['Entrege', 'Lida'];
        $user = User::inRandomOrder()->first();

        return [
            'mensagem' => fake()->sentence(),
            'estado' => $estados[fake()->numberBetween(0,1 )],
            'user_id' => $user->id,
        ];
    }
}
