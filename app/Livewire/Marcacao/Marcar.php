<?php

namespace App\Livewire\Marcacao;

use App\Mail\MarcacaoFeita;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Marcacao;
use App\Models\Personal;
use App\Models\Atividade;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Collection;

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
        'dia' => 'required|after:today',
        'hora' => 'required|after:9:15|before:21:15',
        'personal_id' => 'required|exists:personals,id',
    ];

    protected $messages = [
        'dia.required' => 'É Obrigatorio Selecionar um dia',
        'dia.after' => 'O Dia não pode ser hoje ou antes',
        'hora.required' => 'É Obrigatorio Selecionar um hora',
        'hora.after' => 'Tem de Selecionar uma hora em que o Ginasio esteja aberto',
        'hora.before' => 'Tem de Selecionar uma hora em que o Ginasio esteja aberto',
        'personal_id.required' => 'Tem que Selecionar um Responsavel pela atividade',
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
        $pt = Personal::findOrFail($this->personal_id);
        $email = User::findOrFail($pt->user_id)->email;

        $data = ['nome' => Auth::user()->name];

        Mail::to($email)->send(new MarcacaoFeita($data));
        $this->reset(['dia','hora', 'personal_id']);
        $this->redirectRoute('marcacoes');
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
