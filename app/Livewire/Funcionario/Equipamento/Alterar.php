<?php

namespace App\Livewire\Funcionario\Equipamento;

use App\Models\Equipamento;
use Livewire\Component;

class Alterar extends Component
{
    public Equipamento $equipamento;
    public ?string $tipo;

    public function render()
    {
        return view('livewire.funcionario.equipamento.alterar');
    }
}
