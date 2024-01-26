<?php

namespace App\Livewire\Sugestoes;

use Livewire\Component;
use App\Models\Reclamacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    public bool $sugestao = false;
    public ?string $titulo;
    public ?string $descricao;
    public ?string $user_id;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'user_id' => 'required',
    ];

    

    public function guardar()
    {
        $this->user_id = Auth::user()->id;

        Reclamacao::create($this->validate());

        $this->reset();
        session()->flash('sucesso', 'A Sua Review Foi Submetida Com Sucesso');
    }

    public function render()
    {
        return view('livewire.sugestoes.create');
    }
}
