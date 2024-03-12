<?php

namespace App\Livewire\Planos;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Categorias extends Component
{
    public Collection $categorias;

    public ?Categoria $cID;
    public string $base = "base";

    public ?string $nome;

    public function render()
    {
        return view('livewire.planos.categorias');
    }

    public function mount()
    {
        $this->categorias = Categoria::all();
        if(session('sucessoC'))
        {
            $this->dispatch('notify', Session::get('sucessoC'));
        }
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
        $this->categorias = Categoria::all();
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
