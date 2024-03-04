<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Equipamento;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Table extends Component
{
    public Collection $equipamentos;


    public function adicionar() : void 
    {
        $this->dispatch('adicionar')->to('funcionario.equipamento.base');   
    }

    public function alterar($id) : void 
    {
        $this->dispatch('alterar', $id)->to('funcionario.equipamento.base');       
    }

    public function add($id): void
    {
        $this->dispatch('add', $id)->to('funcionario.equipamento.base');
    }


    public function mount()
    {
        $this->equipamentos = Equipamento::all();
        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
    }


    public function render()
    {
        return view('livewire.funcionario.equipamento.table');
    }
}
