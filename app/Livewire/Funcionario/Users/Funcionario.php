<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;

class Funcionario extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public bool $ordena = false;

    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('funcionarioPage');
    }

    function ordenar() : void 
    {
        if($this->ordena)
        {
            $this->ordena = false;
        }
        else
        {
            $this->ordena = true;
        }    
    }

    #[On('funcionario::created')]
    public function montar() 
    {
        if(!$this->ordena)
        {
            $funcionarios = User::query()
            ->where('utype', 'Funcionario')
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate($this->perPage, ['*'], 'funcionarioPage');   
        }
        else
        {
            $funcionarios = User::query()
            ->where('utype', 'Funcionario')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name')
            ->paginate($this->perPage, ['*'], 'funcionarioPage');
        }
        
        return $funcionarios;
    }

    public function render()
    {
        $funcionarios = $this->montar();


        return view('livewire.funcionario.users.funcionario', compact('funcionarios'));
    }
}
