<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ViewController extends Controller
{
    public function cliente(): View
    {
        return view('cliente.index');
    }
}
