<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercicio>
 */
class ExercicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoria = Categoria::inRandomOrder()->first();

        return [
            'nome' => fake()->word(),
            'descricao' => fake()->sentence(),
            'categoria_id' => $categoria->id,
        ];
    }
}
