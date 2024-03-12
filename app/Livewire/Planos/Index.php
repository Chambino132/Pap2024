<?php

namespace App\Livewire\Planos;

use App\Models\Exercicio;
use App\Models\Plano;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;


class Index extends Component
{
    public Collection $planos;

    public ?string $base = "base";
    public ?bool $add = false;
    public ?Plano $pID;

    public ?string $nome;
    public ?string $descricao;
    public ?string $preco;

    protected $rules = [
        'nome' => 'required | string',
        'descricao' => 'required | string',
        'preco' => 'required | numeric',
    ];


    public function mount()
    {
        if(Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
        {
            $this->planos = Plano::all();
        }
        else
        {
            $this->planos = Auth::user()->cliente->planos;
        }

        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
    }

    public function render()
    {
        return view('livewire.planos.index');
    }

    

    #[On('plano::delete')]
    public function planoDelete()
    {
        session()->flash('sucesso', 'O Plano foi Deletado com sucesso!');
        return redirect(request()->header('Referer'));
    }

    public function refresh()
    {
        $this->reset();
        $this->planos = Plano::all();
    }

    public function alterar($id)
    {
        $this->pID = Plano::findOrFail($id);
        $this->nome = $this->pID->nome;
        $this->descricao = $this->pID->descricao;
        $this->preco = $this->pID->preco;
        $this->base = "alterar";
    }
    
    public function SalvarAlterar()
    {
        $this->pID->update($this->validate());
        $this->refresh();
        $this->dispatch('notify', "Plano alterado com sucesso!");        
    }

    public function SalvarAdicionar()
    {
        Plano::create($this->validate());

        $this->refresh();
        $this->dispatch('notify', "Plano adicionado com sucesso!");
    }

    public function adicionar()
    {
        $this->base = "adicionar";
    }
    
    public function cancelar()
    {
        $this->base = "base";
        $this->nome = "";
        $this->descricao = "";
        $this->preco = null;
    }
}
