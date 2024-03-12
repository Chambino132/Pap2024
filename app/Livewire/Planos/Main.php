<?php

namespace App\Livewire\Planos;

use App\Models\Cliente;
use App\Models\Plano;
use Livewire\Component;

class Main extends Component
{

    public Cliente $cliente;
    public Plano $plano;

    public function mount($cliente = null, $plano = null)
    {
        if($cliente && $plano)
        {
            
            $this->cliente = $cliente;
            $this->plano = $plano;
            
        }
    }


    public function render()
    {
        return view('livewire.planos.main')->layout('layouts.app');
    }
}
