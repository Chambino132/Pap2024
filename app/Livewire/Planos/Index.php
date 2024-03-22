<?php

namespace App\Livewire\Planos;

use App\Models\Exercicio;
use App\Models\Plano;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public ?string $base = "base";
    public ?bool $add = false;
    public ?Plano $pID;

    public ?string $nome;
    public ?string $descricao;
    public ?string $preco;

    public int $perPage = 10;
    public string $search = '';
    public string $ordena = '';

    protected $rules = [
        'nome' => 'required | string',
        'descricao' => 'required | string',
        'preco' => 'required | numeric',
    ];

    #[On('paginationPlanos::updated')]
    public function updatingSearch(): Void
    {
        $this->setPage(1, 'planosPage');
    }

    public function mount()
    {

        

        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
    }

    public function render()
    {
        if(Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
        {
            switch($this->ordena)
            {
                case 'nome':
                    $planos = Plano::query()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->orderby('nome')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
                case 'descricao':
                    $planos = Plano::query()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->orderby('descricao')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
                case 'preco':
                    $planos = Plano::query()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->orderby('preco')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
                default:
                    $planos = Plano::query()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
            }

            
        }
        else
        {
            switch($this->ordena)
            {
                case 'nome':
                    $planos = Auth::user()->cliente->planos()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->orderby('nome')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
                case 'descricao':
                    $planos = Auth::user()->cliente->planos()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->orderby('descricao')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
                default:
                    $planos = Auth::user()->cliente->planos()
                    ->where('nome', 'like', '%'. $this->search. '%')
                    ->Orwhere('descricao', 'like', '%'. $this->search. '%')
                    ->paginate($this->perPage, ['*'], 'planosPage');
                    break;
            }
        }

        return view('livewire.planos.index', compact('planos'));
    }

    public function ordenar($ordena)
    {
        if($this->ordena == $ordena)
        {
            $this->ordena = '';
        }
        else
        {
            $this->ordena = $ordena;
        }
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
