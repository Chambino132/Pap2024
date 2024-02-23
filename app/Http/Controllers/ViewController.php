<?php

namespace App\Http\Controllers;

use App\Models\{Cliente, Equipamento, Fotos, Funcionario, Mensalidade, Noticia, Personal};
use Carbon\Carbon;
use Illuminate\View\View as View;

class ViewController extends Controller
{
    public function noticias(): View
    {
        $noticias = Noticia::all();

        return view('publica.noticias', compact('noticias'));
    }

    public function galeria(): View
    {
        $fotos = Fotos::all();

        return view('publica.galeria', compact('fotos'));
    }

    public function sobre():View
    {
        $mensalidades = Mensalidade::all();

        return view('publica.sobre', compact('mensalidades'));
    }

    public function index(): View
    {
        

        $clientes = Cliente::all()->count();
        $equipamentos = Equipamento::all()->count();
        $anos = Carbon::createFromDate(2009)->age;
        $colaboradores = Personal::all()->count() + Funcionario::all()->count();

        return view('publica.entrada', compact('clientes', 'equipamentos', 'anos', 'colaboradores'));
    }
}
