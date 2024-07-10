<?php

namespace App\Livewire\Sugestoes;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Notas extends Component
{
    public Collection $notas;

    public bool $add = false;
    public bool $filed = false;

    public ?string $titulo = "";
    public ?string $descricao = "";
    public bool $arquivado = false;
    public string $funcionario_id = "";

    public function render()
    {
        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }

        $this->notas = Nota::all();
        return view('livewire.sugestoes.notas');
    }

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'arquivado' => 'required|boolean',
        'funcionario_id' => 'required'
    ];

    #[On('nota::delete')]
    public function refresh()
    {
        session()->flash('sucesso', 'Nota deletada!');
        return redirect(request()->header('Referer'));
    }

    public function arquivar(Nota $id)
    {
        $id->arquivado = true;
        $id->save();

        $this->dispatch('notify', 'A nota foi arquivada com sucesso');
    }

    public function desarquivar(Nota $id)
    {
        $id->arquivado = false;
        $id->save();

        $this->dispatch('notify', 'A nota foi desarquivada com sucesso');
    }

    public function adicionar()
    {
        $this->titulo = "";
        $this->descricao = "";
        $this->add = true;
    }

    public function salvar()
    {
        $this->funcionario_id = Auth::user()->funcionario->id;
        // dd($this->validate());
        // dd($this->titulo, $this->descricao, $this->arquivado, $this->funcionario_id);
        
        Nota::create($this->validate());
        $this->dispatch('notify', 'A nota foi criada com sucesso');
        $this->add = false;
    }

    public function cancel()
    {
        $this->add = false;
    }

    public function arquivo()
    {
        $this->filed = true;
    }

    public function desarquivado()
    {
        $this->filed = false;
    }
}
