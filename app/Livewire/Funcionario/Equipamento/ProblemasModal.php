<?php

namespace App\Livewire\Funcionario\Equipamento;

use App\Models\Equipamento;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class ProblemasModal extends ModalComponent
{
    
    public Equipamento $maquina;

    public function render()
    {
        return view('livewire.funcionario.equipamento.problemas-modal');
    }
}
