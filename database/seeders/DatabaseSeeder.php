<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\{Categoria, Exercicio, Fotos, Noticia, Plano, User};

use App\Models\Atividade;
use App\Models\Best;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\Marcacao;
use App\Models\Mensagem;
use App\Models\Mensalidade;
use App\Models\Pagamento;
use App\Models\Perdidos;
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

        $this->call([
            TextSeeder::class,
        ]);

        Equipamento::factory(10)
            ->has(Problema::factory(3))
            ->create();

        Mensalidade::factory(4)
            ->create();

        User::factory(20)
            ->has(Reclamacao::factory())
            ->has(Cliente::factory()
                ->has(Presenca::factory(3))
                ->has(Pagamento::factory(3))
                ->has(Best::factory(5)))
            ->create(['utype' => 'Cliente']);

        User::factory(5)
            ->has(Funcionario::factory())
            ->create(['utype' => 'Funcionario']);

        Atividade::factory(4)
            ->create();

        User::factory(5)
            ->has(Personal::factory())
            ->has(Reclamacao::factory())
            ->create(['utype' => 'Personal']);

        //User Admin
        User::factory(1)->create(['utype' => 'Admin']);

        Marcacao::factory(10)->create();

        Categoria::factory(6)->create();

        Plano::factory(3)
            ->create();

        Perdidos::factory(5)->create();

        
    }
}
