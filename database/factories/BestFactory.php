<?php

namespace Database\Factories;

use App\Models\Equipamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Best>
 */
class BestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $equipamento = Equipamento::inRandomOrder()->first();

        return [
            'equipamento_id' => $equipamento->id,
            'pb' => fake()->numberBetween(0,300),
        ];
    }
}
