<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Mensalidade;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class NaoConfirmado extends Component
{
    public Collection $usersNC;
    public bool $alterar = true;
    public string $tipo;
    public Collection $mensalidades;

    public function mount()
    {
        $this->usersNC = User::Where('utype', 'PorConfirmar')->get();
        $this->mensalidades = Mensalidade::all();

    }

    public function mudar()
    {
        $this->alterar = false;
    }

    public function desassociar()
    {
        $this->alterar = true;
    }
    
    #[On('tipo::changed')]
    public function render()
    {
        return view('livewire.funcionario.users.nao-confirmado');
    }

    public function guardar()
    {
        
    }
}
