<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perdidos>
 */
class PerdidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $estado = ['porEncontrar', 'devolvido', 'encontrado'];

        return [
            'item' => fake()->word(),
            'localizacao' => fake()->sentence(),
            'estado' => $estado[fake()->numberBetween(0 , 2)],
        ];
    }
}
