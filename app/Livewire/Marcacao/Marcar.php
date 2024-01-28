<?php

namespace App\Livewire\Marcacao;

use Livewire\Component;
use App\Models\Personal;
use App\Models\Atividade;
use App\Models\Marcacao;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class Marcar extends Component
{
    public Collection $atividades;
    public ?Collection $responsaveis;
    public ?string $selAtividade;
    public bool $resSelected = false;

    public ?string $cliente_id;
    public ?string $dia;
    public ?string $hora;
    public ?string $personal_id;

    protected $rules = [
        'cliente_id' => 'required|exists:clientes,id',
        'dia' => 'required|after:tomorrow',
        'hora' => 'required|after:9:15|before:21:15',
        'personal_id' => 'required|exists:personals,id',
    ];

    protected $messages = [
        'dia.required' => 'É Obrigatorio Selecionar um dia',
        'dia.after' => 'O Dia não pode ser hoje ou antes',
        'hora.required' => 'É Obrigatorio Selecionar um hora',
        'hora.after' => 'Tem de Selecionar uma hora em que o Ginasio esteja aberto',
        'hora.before' => 'Tem de Selecionar uma hora em que o Ginasio esteja aberto',
        'personal_id' => 'Tem que Selecionar um Responsavel pela atividade',
    ];


    function mount(): void
    {
        $this->montar();
    }

    #[On('atividade::changed')]
    function responsavel() : void 
    {
        $this->responsaveis = Personal::where('atividade_id', $this->selAtividade)->get();
    }

    function marcar(): void
    {
        Marcacao::create($this->validate());
        $this->reset();
        $this->montar();
    }

    function montar(): void
    {
        $this->cliente_id = Auth::user()->cliente->id;
        $this->atividades = Atividade::all();    
    }

    

    public function render()
    {
        return view('livewire.marcacao.marcar');
    }


}
