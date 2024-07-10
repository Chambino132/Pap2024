<?php

namespace App\Livewire\Modals;

use App\Models\Funcionario;
use LivewireUI\Modal\ModalComponent;

class ShowImage extends ModalComponent
{
    public Funcionario $funcionario;

    public function render()
    {
        return view('livewire.modals.show-image');
    }
}
