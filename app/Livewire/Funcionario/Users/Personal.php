<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On; 

class Personal extends Component
{
    public Collection $usersP;

    public function mount()
    {
        $this->usersP = User::Where('utype', 'Personal')->get();
    }

    
    public function render()
    {
        return view('livewire.funcionario.users.personal');
    }

    #[On('personal::created')]
    public function refresh() : void 
    {
        $this->usersP = User::Where('utype', 'Personal')->get();
    }

}
