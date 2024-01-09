<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On; 

class Clientes extends Component
{
    public Collection $usersC;

    public function mount()
    {
        $this->usersC = User::Where('utype',"Cliente")->get();
    }

    public function render()
    {
        return view('livewire.funcionario.users.clientes');
    }

    #[On('cliente::created')]
    public function refresh() : void 
    {
        $this->dispatch('$refresh');
    }
}
