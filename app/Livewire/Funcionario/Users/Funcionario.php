<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;

class Funcionario extends Component
{
    

    public Collection $funcionarios;


    public function mount() : void
    {
        $this->montar();
    }

    #[On('funcionario::created')]
    public function montar(): void 
    {
        $this->funcionarios = User::where('utype', 'Funcionario')->get();
    }

    public function render()
    {
        return view('livewire.funcionario.users.funcionario');
    }
}
