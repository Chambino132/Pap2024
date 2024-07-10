<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Problema>
 */
class ProblemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estado = ['Resolvido', 'Em Progresso', 'Por Resolver'];

        return [
            'problema' => fake()->sentence(),
            'estado' => $estado[fake()->numberBetween(0,2)],
        ];
    }
}
