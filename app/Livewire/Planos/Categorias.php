<?php

namespace App\Livewire\Planos;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Categorias extends Component
{
    use WithPagination;

    public ?Categoria $cID;
    public string $base = "base";

    public ?string $nome;

    public int $perPage = 10;
    public string $search = '';
    public string $ordena = '';

    public function render()
    {
        if($this->ordena == 'nome')
        {
            $categorias = Categoria::query()
                            ->where('nome', 'like', '%'. $this->search. '%')
                            ->orderby('nome')
                            ->paginate($this->perPage, ['*'], 'categoriasPage');
        }
        else
        {
            $categorias = Categoria::query()
                            ->where('nome', 'like', '%'. $this->search. '%')
                            ->paginate($this->perPage, ['*'], 'categoriasPage');
        }

        if(session('sucessoC'))
        {
            $this->dispatch('notify', Session::get('sucessoC'));
        }

        return view('livewire.planos.categorias', compact('categorias'));
    }

    public function rules()
    {
        return [
            'nome' => 'required|string',
        ];
    }

    public function refresh()
    {
        $this->reset();
    }

    public function ordenar(): void 
    {
        if($this->ordena == 'nome')
        {
            $this->ordena = '';
        }    
        else
        {
            $this->ordena = 'nome';
        }
    }


    #[On('paginationCategorias::updated')]
    public function updatingSearch(): Void
    {
        $this->setPage(1,'categoriasPage');
    }

    #[On('categoria::delete')]
    public function categoriaDelete()
    {
        session()->flash('sucessoC', 'A Categoria foi Deletada com sucesso!');
        return redirect(request()->header('Referer'));
    }

    public function alterar($id)
    {
        $this->cID = Categoria::findOrFail($id);
        $this->base = "alterar";

        $this->nome = $this->cID->nome;
    }

    public function adicionar()
    {
        $this->base = "adicionar";
    }

    public function cancelar()
    {
        $this->base = "base";
        $this->nome = "";
    }

    public function SalvarAlterar()
    {
        $this->cID->update($this->validate());
        $this->refresh();
        $this->base = "base";

        $this->dispatch('notify', 'A Categoria foi alterada com sucesso!');
    }

    public function SalvarAdicionar()
    {
        Categoria::create($this->validate());

        $this->refresh();
        $this->dispatch('notify', 'A Categoria foi criada com sucesso!');
    }

}
