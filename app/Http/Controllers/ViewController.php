<?php

namespace App\Http\Controllers;

use App\Models\{Fotos, Noticia};
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
}
