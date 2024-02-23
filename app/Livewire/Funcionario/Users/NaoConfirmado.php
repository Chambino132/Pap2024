<?php

namespace App\Livewire\Funcionario\Users;

use App\Livewire\Funcionario\Users\Personal as UsersPersonal;
use App\Models\Atividade;
use App\Models\Cliente;
use App\Models\Mensalidade;
use App\Models\User;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NaoConfirmado extends Component
{
    public Collection $usersNC;
    public bool $alterar = false;
    public Collection $mensalidades;
    public Collection $atividades;

    public string $user_id = "";
    public ?string $tipo;
    public ?string $mensalidade_id;
    public ?string $atividade_id;
    public ?string $NIF;
    public ?string $dtNascimento;
    public ?string $telefone;
    public ?string $morada;

    protected $rules = [
        'user_id' => 'required ',
        'tipo' => 'required',
        'mensalidade_id' => 'sometimes',
        'NIF' => 'required | digits:9 | string',
        'dtNascimento' => 'required | date',
        'telefone' => 'required | min:9 | string',
        'morada' => 'required | max:255 | string',
        'atividade_id' => 'sometimes',
    ];

    protected $messages = [
        'user_id.required' => "O utilizador é obrigatorio",
        'tipo.required' => "O tipo de utilizador é obrigatorio",
        'NIF.required' => "O NIF é obrigatorio",
        'NIF.digits' => "O NIF só pode ter 9 digitos",
        'NIF.string' => "O NIF tem de ser um conjunto de caracteres",
        'dtNascimento.required' => "A Data de Nascimento é obrigatoria",
        'dtNascimento.date' => "A Data de Nascimento tem de ser uma data",
        'telefone.required' => "O Telefone é obrigatorio",
        'telefone.min' => "O Telefone tem de ter no minimo 9 digitos",
        'telefone.string' => "O Telefone tem de ser um conjunto de caracteres",
        'morada.required' => "A Morada é obrigatoria",
        'morada.max' => "A Morada tem de ter no maximo 255 caracters",
        'morada.string' => "A Morada tem de ser um conjunto de caracteres",
    ];


    public function mount()
    {
        $this->usersNC = User::Where('utype', 'PorConfirmar')->get();
        $this->mensalidades = Mensalidade::all();
        $this->atividades = Atividade::all();
    }

    public function mudar()
    {
        $this->alterar = true;
    }

    public function cancelar()
    {
        
        $this->reset([
        'user_id', 
        'tipo',
        'mensalidade_id',
        'atividade_id',
        'NIF',
        'dtNascimento',
        'telefone',
        'morada',
        'alterar',
    ]);
    }
    
    #[On('tipo::changed')]
    public function render()
    {
        return view('livewire.funcionario.users.nao-confirmado');
    }

    public function guardar()
    {
        if($this->tipo == "Cliente")
        {
            Cliente::create($this->validate());

            $user = User::findOrFail($this->user_id);

            $user->utype = "Cliente";

            $user->save();
            
            $this->dispatch('cliente::created')->to(Clientes::class);
            $this->dispatch('notify', "O user: $user->name foi associado como cliente");
        }
        else
        {
            Personal::create($this->validate());
            
            $user = User::findOrFail($this->user_id);

            $user->utype = "Personal";

            $user->save();
            
            $this->dispatch('personal::created')->to(UsersPersonal::class);
            $this->dispatch('notify', "O user: $user->name foi associado como Personal Trainer");
        }

        $this->usersNC = User::Where('utype', 'PorConfirmar')->get();
        $this->cancelar();   
    }
}
