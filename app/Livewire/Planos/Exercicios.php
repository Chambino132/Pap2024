<?php

namespace App\Livewire\Planos;

use App\Models\Categoria;
use App\Models\Exercicio;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Exercicios extends Component
{
    public Collection $exercicios;
    public Collection $categorias;

    public ?string $nome;
    public ?string $descricao;
    public ?string $categoria_id = "";

    public string $base = "base";
    public ?Exercicio $eID;

    protected $rules = [
        'nome' => 'required | string',
        'descricao' => 'required | string',
        'categoria_id' => 'required | numeric',
    ];

    public function render()
    {
        return view('livewire.planos.exercicios');
    }

    public function mount()
    {
        $this->exercicios = Exercicio::all();
        $this->categorias = Categoria::all();
        if(session('sucessoE'))
        {
            $this->dispatch('notify', Session::get('sucessoE'));
        }
    }

    public function refresh()
    {
        $this->reset();
        $this->exercicios = Exercicio::all();
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
