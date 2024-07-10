<?php

namespace App\Livewire\Modals;

use App\Models\Exercicio;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeleteexercicio extends ModalComponent
{
    public ?Exercicio $exercicio;

    public function render()
    {
        return view('livewire.modals.confirmacao-deleteexercicio');
    }

    public function delConfirm()
    {
        if ($this->exercicio->planos()->count() == 0)
        {
            $this->exercicio->delete();
            $this->closeModal();
            session()->flash('sucessoE', 'Exercicio deletado!');
            return redirect(request()->header('Referer'));
        }
        else
        {
            $this->closeModal();
            $this->dispatch('notify', 'Não pode deletar um exercicio que esteja em um plano!');
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
