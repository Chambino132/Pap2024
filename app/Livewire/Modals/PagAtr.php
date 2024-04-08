<?php

namespace App\Livewire\Modals;

use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;


class PagAtr extends ModalComponent
{
    public int $id;

    public function confirmada()
    {
        $this->dispatch('MarcarEntrada',$this->id)->to('funcionario.users.clientes');
        $this->dispatch('closeModal');
    }


    public function render()
    {
        return view('livewire.modals.pag-atr');
    }
}
