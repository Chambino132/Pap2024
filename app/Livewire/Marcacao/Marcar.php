<?php

namespace App\Livewire\Marcacao;

use App\Mail\MarcacaoFeita;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Marcacao;
use App\Models\Personal;
use App\Models\Atividade;
use App\Models\AtividadePersonal;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Marcar extends Component
{
    public Collection $atividades;
    public ?array $responsaveis;
    public ?string $atividade_id;
    public bool $resSelected = false;
    public string $personal_id;

    public ?string $cliente_id;
    public ?string $dia;
    public ?string $hora;
    public ?string $atividade_personal_id;

    protected $rules = [
        'cliente_id' => 'required|exists:clientes,id',
        'dia' => 'required|after:today',
        'hora' => 'required|after:9:15|before:21:15',
        'atividade_personal_id' => 'required|exists:atividade_personals,id',
    ];

    protected $messages = [
        'dia.required' => 'É Obrigatorio Selecionar um dia',
        'dia.after' => 'O Dia não pode ser hoje ou antes',
        'hora.required' => 'É Obrigatorio Selecionar um hora',
        'hora.after' => 'Tem de Selecionar uma hora em que o Ginasio esteja aberto',
        'hora.before' => 'Tem de Selecionar uma hora em que o Ginasio esteja aberto',
        'atividade_personal_id.required' => 'Tem que Selecionar um Responsavel pela atividade',
    ];


    function mount(): void
    {
        $this->montar();
    }

    #[On('atividade::changed')]
    function responsavel() : void 
    {
        $this->responsaveis = array();

        // dd($this->atividade_id);
       $atividade = Atividade::findOrFail($this->atividade_id);

        $TEMPresponsaveis = $atividade->personals;

        foreach($TEMPresponsaveis as $responsavel)
        {
            $personal = Personal::findOrFail($responsavel->personal_id);

            $this->responsaveis[$personal->id] = [
                'nome' => $personal->user->name,
            ];
        }
        
    }

    function marcar(): void
    {
        $atividade_personal = AtividadePersonal::where('personal_id', '=', $this->personal_id)
                                ->where('atividade_id', '=', $this->atividade_id)
                                ->first(); 
        
        $this->atividade_personal_id = $atividade_personal->id;

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
