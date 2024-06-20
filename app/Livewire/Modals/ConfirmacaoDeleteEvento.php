<?php

namespace App\Livewire\Modals;

use App\Models\Event;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeleteEvento extends ModalComponent
{
    public ?Event $eventID;

    public function render()
    {
        return view('livewire.modals.confirmacao-delete-evento');
    }

    public function delConfirm()
    {
        $this->eventID->delete();
        $this->closeModal();
        session()->flash('sucessoE', 'Evento deletado!');
        $this->dispatch('evento::delete');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
