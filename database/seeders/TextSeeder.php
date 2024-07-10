<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sobres')->insert([
            'titulo' => "Tudo sobre PepaGym ",
            'texto' =>  "PepaGym é um ginásio situado em Coruche que apesar de não ter um espaço grande como outros, é perfeito para os seus treinos e saúde, com diversos equipamentos novos e cuidados, colaboradores que adoram o que fazem, uma comunidade amigável. Podemos não ser o maior ginásio, mas somos o ginásio ideal para si!"
        ]);

        DB::table('sobres')->insert([
            'titulo' => "Inauguração ",
            'texto' =>  "PepaGym está desde Maio de 2009 a forncecer um local de treino para os seus clientes.",
        ]);

        DB::table('sobres')->insert([
            'titulo' => "Localização  ",
            'texto' =>  "Localizado na Rua Joana Isabel Matos Lima Dias.",
        ]);

        DB::table('sobres')->insert([
            'titulo' => "Estabelecimento",
            'texto' =>  "Temos uma gama variada equipamentos para contribuir no seu treino, acesso a Personal Trainers. Além dos treinos comuns temos a possibilidade de aulas de grupo.",
        ]);

        DB::table('heroes')->insert([
            'titulo' => "Bem vindo ao PepaGym",
            'subtitulo' => "Um ginásio na Vila de Coruche, com maquinas e equipamentos da melhor qualidade para se manter em forma!"
        ]);

        DB::table('heroes')->insert([
            'titulo' => "O Seu Conforto Em Primeiro Lugar ",
            'subtitulo' => "O conforto e a saúde dos nossos clientes é a nossa prioridade número 1! Temos uma arquitetura agradável para todos se sentirem o mais confortavel possivel."
        ]);

        DB::table('heroes')->insert([
            'titulo' => "Uma Equipa Sempre Aqui Para Si ",
            'subtitulo' => "A nossa equipa está sempre disponível para resolver todos os seus problemas, responder às suas dúvidas e perservar a sua segurança durante os seus treinos."
        ]);
    }
}
