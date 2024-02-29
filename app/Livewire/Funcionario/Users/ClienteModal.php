<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Cliente;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ClienteModal extends ModalComponent
{
public static function modalMaxWidth(): string
{
    return '5xl';
}
    public Cliente $UCliente;
    public function render()
    {
        return view('livewire.funcionario.users.cliente-modal');
    }
}
