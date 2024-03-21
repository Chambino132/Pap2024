<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Equipamento;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Table extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public string $ordenaPor = ''; 


    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('equipamentoPage');
  
    }

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

    public function ordena($ordenaPor)
    {
        if($this->ordenaPor == $ordenaPor)
        {
            $this->ordenaPor = '';
        }
        else
        {
            $this->ordenaPor = $ordenaPor;
        }
    }


    public function montar() 
    {
        if($this->ordenaPor == 'equipamento')
        {
            $equipamentos = Equipamento::query()
            ->where('equipamento', 'like', '%'.$this->search. '%')
            ->orderBy('equipamento')
            ->paginate($this->perPage);
        }
        else if ($this->ordenaPor == 'data')
        {
            $equipamentos = Equipamento::query()
            ->where('equipamento', 'like', '%'.$this->search. '%')
            ->orderBy('dtAquisicao')
            ->paginate($this->perPage);
        }
        else if($this->ordenaPor == 'preco')
        {
            $equipamentos = Equipamento::query()
            ->where('equipamento', 'like', '%'.$this->search. '%')
            ->orderBy('preco')
            ->paginate($this->perPage);
        }
        else
        {
            $equipamentos = Equipamento::query()
            ->where('equipamento', 'like', '%'.$this->search. '%')
            ->paginate($this->perPage, ['*'], 'equipamentoPage');

            if (empty($this->search) && $equipamentos->isEmpty()) {
                $equipamentos = Equipamento::paginate($this->perPage, ['*'], 'equipamentoPage');
            }
        }

        return $equipamentos;
    }


    public function render()
    {
        $equipamentos = $this->montar();


        // if(session('sucesso'))
        // {
        //     $this->dispatch('notify', Session::get('sucesso'));
        // }
        return view('livewire.funcionario.equipamento.table', compact('equipamentos'));
    }
}
