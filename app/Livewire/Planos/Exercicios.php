<?php

namespace App\Livewire\Planos;

use App\Models\Categoria;
use App\Models\Exercicio;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Exercicios extends Component
{
    
    use WithPagination;

    public Collection $categorias;

    public ?string $nome;
    public ?string $descricao;
    public ?string $categoria_id = "";

    public string $base = "base";
    public ?Exercicio $eID;

    public int $perPage = 10;
    public string $search = '';
    public string $ordena = '';

    protected $rules = [
        'nome' => 'required | string',
        'descricao' => 'required | string',
        'categoria_id' => 'required | numeric',
    ];

    #[On('paginationExercicios::updated')]
    public function updatingSearch(): Void
    {
        $this->setPage(1,'exerciciosPage');
    }

    public function render()
    {
        switch($this->ordena)
        {
            case 'nome':

                break;
            case 'descricao':

                break;
            case 'categoria':

                break;
            default:
                $exercicios = Exercicio::query()
                                ->join('categorias', 'exercicios.categoria_id', 'categorias.id')
                                ->where('exercicios.nome', 'like', '%'. $this->search. '%')
                                ->orwhere('descricao', 'like', '%'. $this->search. '%')
                                ->orwhere('categorias.nome', 'like', '%'. $this->search .'%')
                                ->select('exercicios.nome as nome', 'categorias.nome as catNome', 'exercicios.descricao as descricao', 'exercicios.id as id')
                                ->orderby('exercicios.id')
                                ->paginate($this->perPage, ['*'], 'exerciciosPage');
                break;
        }

        return view('livewire.planos.exercicios', compact('exercicios'));
    }

    public function mount()
    {

        $this->categorias = Categoria::all();
        if(session('sucessoE'))
        {
            $this->dispatch('notify', Session::get('sucessoE'));
        }
    }

    public function refresh()
    {
        $this->reset();
        $this->categorias = Categoria::all();
    }
    
    #[On('exercicio::delete')]
    public function exercicioDelete()
    {
        return redirect(request()->header('Referer'));
    }

    public function alterar($id)
    {
        $this->base = "alterar";

        $this->eID = Exercicio::findOrFail($id);
        $this->nome = $this->eID->nome;
        $this->descricao = $this->eID->descricao;
        $this->categoria_id = $this->eID->categoria_id;
    }

    public function SalvarAlterar()
    {
        $this->eID->update($this->validate());
        $this->refresh();
        $this->dispatch('notify', 'O Exercicio foi alterado com sucesso!');
    }

    public function adicionar()
    {
        $this->base = "adicionar";
    }

    public function SalvarAdicionar()
    {
        Exercicio::create($this->validate());

        $this->refresh();
        $this->dispatch('notify', 'O Exercicio foi criado com sucesso!');
    }

    public function cancelar()
    {
        $this->base = "base";
        $this->nome = "";
        $this->descricao = "";
        $this->categoria_id = null;
    }

}
