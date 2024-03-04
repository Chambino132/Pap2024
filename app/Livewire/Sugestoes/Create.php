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
        session() ->flash('sucesso', 'A sua review foi submetida com sucesso!');
        return redirect(request()->header('Referer'));
        
    }

    public function render()
    {
        if(Session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }

        return view('livewire.sugestoes.create');
    }
}
