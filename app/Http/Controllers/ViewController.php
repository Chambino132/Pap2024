<?php

namespace App\Http\Controllers;

use App\Models\{Cliente, Equipamento, Fotos, Funcionario, Mensalidade, Noticia, Personal, Reclamacao};
use Carbon\Carbon;
use Illuminate\View\View as View;

class ViewController extends Controller
{
    public function noticias(): View
    {
        $noticias = Noticia::where('arquivado', true)->get();

        return view('publica.noticias', compact('noticias'));
    }

    public function galeria(): View
    {
        $fotos = Fotos::where('arquivado', true)->get();
        return view('publica.galeria', compact('fotos'));
    }

    public function sobre():View
    {
        $unsorted = Mensalidade::all();
        $mensalidades = $unsorted->sortBy('dias');
        $sugestoes = Reclamacao::where('arquivado', true)->get();

        return view('publica.sobre', compact('mensalidades', 'sugestoes'));
    }

    public function index(): View
    {
        $clientes = Cliente::all()->count();
        $equipamentos = Equipamento::all()->count();
        $anos = Carbon::createFromDate(2009)->age;
        $colaboradores = Personal::all()->count() + Funcionario::all()->count();
        $hero1 = Fotos::where('titulo', 'hero1')->get()->first();
        $hero2 = Fotos::where('titulo', 'hero2')->get()->first();
        $hero3 = Fotos::where('titulo', 'hero3')->get()->first();
        $videoImg = Fotos::where('titulo', 'videoImg')->get()->first();

        return view('publica.entrada', compact('clientes', 'equipamentos', 'anos', 'colaboradores', 'hero1', 'hero2', 'hero3', 'videoImg'));
    }
}
