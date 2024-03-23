<?php

namespace App\Livewire\Pagamentos;

use App\Models\Cliente;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public Cliente $cliente;

    public function render()
    {
        return view('livewire.pagamentos.modal');
    }
}
