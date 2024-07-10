<?php

namespace App\Livewire\Planos\Cliente;

use App\Models\Plano;
use LivewireUI\Modal\ModalComponent;

class ComprarModal extends ModalComponent
{
    public Plano $plano;

    public function render()
    {
        return view('livewire.planos.cliente.comprar-modal');
    }
}
