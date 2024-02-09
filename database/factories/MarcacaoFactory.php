<?php

namespace Database\Factories;

use App\Models\{Atividade, Cliente, Personal};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marcacao>
 */
class MarcacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $cliente   = Cliente::inRandomOrder()->first();
        $personal = Personal::inRandomOrder()->first();


        $estado = ['aceite', 'recusado', 'cancelado', 'pendente'];


        return [
            'dia'          => fake()->date(),
            'hora'         => fake()->time(),
            'personal_id' => $personal->id,
            'cliente_id'   => $cliente->id,
            'estado'       => $estado[fake()->numberBetween(0, 3)],
        ];
    }
}
