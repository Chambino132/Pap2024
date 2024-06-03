<?php

namespace App\Livewire\Modals;

use App\Models\Categoria;
use LivewireUI\Modal\ModalComponent;

class ConfirmacaoDeletecategoria extends ModalComponent
{
    public ?Categoria $categoria;

    public function render()
    {
        return view('livewire.modals.confirmacao-deletecategoria');
    }

    public function delConfirm()
    {
        if ($this->categoria->exercicios()->count() == 0)
        {
            $this->categoria->delete();
            $this->closeModal();
            session()->flash('sucessoC', 'Categoria deletada!');
            $this->dispatch('categoria::delete');
        }
        else
        {
            $this->closeModal();
            $this->dispatch('notify', 'Não pode deletar uma categoria que ainda tenha exercicios!');
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
