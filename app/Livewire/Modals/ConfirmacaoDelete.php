<?php

namespace App\Livewire\Modals;

use App\Models\Equipamento;
use App\Models\Problema;
use Livewire\Attributes\On;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

use function Laravel\Prompts\confirm;

class ConfirmacaoDelete extends ModalComponent
{
    public ?Equipamento $maquina;

    public function render()
    {
        return view('livewire.modals.confirmacao-delete');
    }

    public function delConfirm()
    {
        if ($this->maquina->problemas()->count() == 0)
        {
            $this->maquina->delete();
            $this->closeModal();
            $this->dispatch('equipamento::delete');
            $this->dispatch('notify', "Importante! Equipamento deletado com sucesso!");
        }
        else
        {
            $this->closeModal();
        }
    }
}
