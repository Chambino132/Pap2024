<?php

namespace App\Livewire\Modals;

use App\Models\Nota;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeletenota extends ModalComponent
{
    public ?Nota $notaID;

    public function render()
    {
        return view('livewire.modals.confirmacao-deletenota');
    }

    public function delConfirm()
    {
        $this->notaID->delete();
        $this->closeModal();
        $this->dispatch('nota::delete');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
