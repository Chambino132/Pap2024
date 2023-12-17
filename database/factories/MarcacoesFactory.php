<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marcacoes>
 */
class MarcacoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $personal = Personal::inRandomOrder()->first();
        $cliente = Cliente::inRandomOrder()->first();
        return [
            'dia' => fake()->date(),
            'hora' => fake()->time(),
            'atividade' => fake()->sentence(3),
            'personal_id' => $personal->id,
            'cliente_id' => $cliente->id,
        ];
    }
}
