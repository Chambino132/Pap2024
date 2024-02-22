<?php

namespace App\Livewire\Modals;

use App\Models\Reclamacao;
use Livewire\Attributes\On;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeletesugestao extends ModalComponent
{
    public ?Reclamacao $sugestao;

    public function render()
    {
        return view('livewire.modals.confirmacao-deletesugestao');
    }

    #[On('sugestao::delete')]
    public function refresh()
    {
        return redirect(request()->header('Referer'));
    }

    public function delConfirm()
    {
        $this->sugestao->delete();
        $this->closeModal();
        $this->dispatch('sugestao::delete');
    }
}
