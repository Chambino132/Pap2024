<?php

namespace App\Livewire\Planos\Cliente;

use App\Models\Plano;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $planos;
    

    public function render()
    {
        return view('livewire.planos.cliente.index');
    }

    public function mount()
    {
        $this->planos = Plano::all();
    }
}
