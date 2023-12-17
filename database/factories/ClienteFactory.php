<?php

namespace Database\Factories;

use App\Models\Mensalidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mensalidade = Mensalidade::inRandomOrder()->first();

        return [
            'dtNascimento' => fake()->date(),
            'NIF' => fake()->randomNumber(9, true),
            'telefone' => fake()->phoneNumber(),
            'morada' => fake()->address(),
            'mensalidade_id' => $mensalidade->id,
        ];
    }
}
