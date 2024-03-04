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
            session()->flash('sucesso', 'Equipamento deletado com sucesso');
            $this->dispatch('equipamento::delete');
        }
        else
        {
            $this->closeModal();
            $this->dispatch('notify', 'Não pode deletar um equipamento que ainda tenha problemas!');
        }
    }
}
