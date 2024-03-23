<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\{Categoria, Exercicio, Fotos, Noticia, Plano, User};

use App\Models\Atividade;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\Marcacao;
use App\Models\Mensagem;
use App\Models\Mensalidade;
use App\Models\Pagamento;
use App\Models\Personal;
use App\Models\Presenca;
use App\Models\Problema;
use App\Models\Reclamacao;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Mensalidade::factory(4)
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

        Atividade::factory(5)
            ->create();

        User::factory(5)
            ->has(Personal::factory())
            ->has(Reclamacao::factory())
            ->create();

        Equipamento::factory(100)
            ->has(Problema::factory(3))
            ->create();

        //User PorConfirmar
        User::factory(5)->create();

        //User Admin
        User::factory(5)->create();

        Marcacao::factory(10)->create();


        Categoria::factory(5)->create();

        Plano::factory(5)
            ->has(Exercicio::factory(3))
            ->create();
    }
}
