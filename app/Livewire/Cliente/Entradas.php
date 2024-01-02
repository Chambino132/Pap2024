<?php

namespace App\Livewire\Cliente;

use App\Models\{Cliente, Presenca};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Entradas extends Component
{
    public Collection $presencas;

    public function render()
    {
        return view('livewire.cliente.entradas');
    }

    public function mount()
    {
        $cliente = Cliente::where('user_id', Auth::user()->id)->get();

        $this->presencas = Presenca::where('cliente_id', $cliente->pluck('id')->first())->get();
    }
}
