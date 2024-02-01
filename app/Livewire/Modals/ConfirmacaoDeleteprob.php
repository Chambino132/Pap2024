<?php

namespace App\Livewire\Modals;

use App\Models\Problema;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeleteprob extends ModalComponent
{
    public ?Problema $problema;

    public function render()
    {
        return view('livewire.modals.confirmacao-deleteprob');
    }

    public function delConfirm()
    {
        $this->problema->delete();
        $this->closeModal();
        $this->dispatch('equipamento::delete');
    }
}
