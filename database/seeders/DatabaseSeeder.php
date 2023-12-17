<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\Marcacoes;
use App\Models\Mensalidade;
use App\Models\Personal;
use App\Models\Presenca;
use Illuminate\Database\Seeder;
use \App\Models\User;
use GuzzleHttp\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Mensalidade::factory(7)
            ->create();

        User::factory(5)
            ->has(Cliente::factory()
                ->has(Presenca::factory(3)))
            ->create();

        

        User::factory(5)
            ->has(Funcionario::factory())
            ->create();

        User::factory(5)
            ->has(Personal::factory())
            ->create();

        Marcacoes::factory(10)
            ->create();
        
        Equipamento::factory(5)
            ->create();
    }
}
