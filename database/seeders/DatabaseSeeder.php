<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Atividade;
use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\Marcacao;
use App\Models\Mensalidade;
use App\Models\Pagamento;
use App\Models\Personal;
use App\Models\Presenca;
use App\Models\Problema;
use App\Models\Reclamacao;
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
            ->has(Reclamacao::factory())
            ->has(Cliente::factory()
                ->has(Presenca::factory(3))
                ->has(Pagamento::factory(3)))
            ->create();

        User::factory(5)
            ->has(Funcionario::factory())
            ->has(Reclamacao::factory())
            ->create();

        User::factory(5)
            ->has(Personal::factory())
            ->has(Reclamacao::factory())
            ->create();

        Atividade::factory(5)
            ->has(Marcacao::factory())
            ->create();

        Equipamento::factory(5)
            ->has(Problema::factory(3))
            ->create();

        //User PorConfirmar
        User::factory(5)->create();
    }
}
