<?php

namespace App\Livewire\Funcionario\Equipamento;

use App\Models\Equipamento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class Base extends Component
{
    public Collection $maquinas;

    public function mount()
    {
        $this->maquinas = Equipamento::all();
    }

    public function render()
    {
        return view('livewire.funcionario.equipamento.base');
    }
}
