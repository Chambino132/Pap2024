<?php

namespace App\Livewire\Modals;

use App\Models\Plano;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeleteplano extends ModalComponent
{
    public Plano $plano;

    public function render()
    {
        return view('livewire.modals.confirmacao-deleteplano');
    }

    public function delConfirm()
    {
        if ($this->plano->exercicios()->count() == 0)
        {
            $this->plano->delete();
            $this->closeModal();
            session()->flash('sucesso', 'Plano deletado!');
            $this->dispatch('plano::delete');
        }
        else
        {
            $this->closeModal();
            $this->dispatch('notify', 'Não pode deletar um plano que ainda tenha exercicios!');
        }
    }
}
