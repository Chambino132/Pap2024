<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Cliente;
use Carbon\Carbon;
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
        $data = Carbon::parse($this->UCliente->ultMes);
        $mes = $data->month;
        $ano = $data->year;

        return view('livewire.funcionario.users.cliente-modal', compact('mes', 'ano'));
    }
}
