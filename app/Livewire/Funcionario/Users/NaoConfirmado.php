<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NaoConfirmado extends Component
{
    public Collection $usersNC;
    public bool $alterar = true;

    public function mount()
    {
        $this->usersNC = User::Where('utype', 'PorConfirmar')->get();
    }

    public function associar()
    {
        $userIds = request()->input('userNC_id');
        $novoCargo = request()->input('cargo');

        User::WhereIn('id', $userIds)->update(['utype'=>$novoCargo]);

        $this->alterar = false;

        $this->mount();
    }

    public function mudar()
    {
        $this->alterar = false;
    }

    public function desassociar()
    {
        $this->alterar = true;
    }

    public function render()
    {
        return view('livewire.funcionario.users.nao-confirmado');
    }
}
