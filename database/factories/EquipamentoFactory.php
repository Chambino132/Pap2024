<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipamento>
 */
class EquipamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dtAquisicao' => fake()->date(),
            'preco' => fake()->randomNumber(3, true),
            'equipamento' => fake()->sentence(3, true),
        ];
    }
}
