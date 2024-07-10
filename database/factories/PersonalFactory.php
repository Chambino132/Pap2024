<?php

namespace Database\Factories;

use App\Models\Atividade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'dtNascimento' => fake()->date(),
            'telefone' => fake()->phoneNumber(),
            'morada' => fake()->address(),
        ];
    }
}
