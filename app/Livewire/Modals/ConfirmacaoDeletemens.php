<?php

namespace App\Livewire\Modals;

use App\Models\Mensalidade;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeletemens extends ModalComponent
{
    public ?Mensalidade $mensalidade;

    public function render()
    {
        return view('livewire.modals.confirmacao-deletemens');
    }

    function delConfirm() : void 
    {
        if($this->mensalidade->clientes()->count() == 0)
        {
            $this->mensalidade->delete();
            $this->closeModal();
            session()->flash('sucesso', 'Mensalidade deletado com sucesso');
            $this->dispatch('mensalidade::delete');
        }
        else
        {
            $this->closeModal();
            $this->dispatch('notify', 'Não pode eliminar uma mensalidade que ainda tenha clientes!');
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
