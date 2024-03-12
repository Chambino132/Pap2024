<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Personal;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PersonalModal extends ModalComponent
{
    public Personal $UPersonal;
    public function render()
    {
        return view('livewire.funcionario.users.personal-modal');
    }
}
