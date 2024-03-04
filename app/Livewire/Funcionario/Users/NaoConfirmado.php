<?php

namespace App\Livewire\Funcionario\Users;


use App\Livewire\Funcionario\Users\Personal as UsersPersonal;
use App\Models\Atividade;
use App\Models\Cliente;
use App\Models\Mensalidade;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Funcionario;
use Livewire\Component;
use App\Models\Personal;
use App\Models\Atividade;
use App\Models\Mensalidade;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Livewire\Funcionario\Users\Personal as UsersPersonal;

class NaoConfirmado extends Component
{
    use WithFileUploads;

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

    public ?string $atividade_id;
    public ?string $cargo;
    public $imagem;


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
        'cargo.string' => "O cargo tem de ser um conjuto de caracteres",
        'imagem.image' => "A foto tem de ser uma imagem",
    ];

    public function rules()
    {
        if($this->tipo == "Cliente")
        {
            return [
                'user_id' => 'required ',
                'mensalidade_id' => 'required',
                'NIF' => 'required | digits:9 | string',
                'dtNascimento' => 'required | date',
                'telefone' => 'required | min:9 | string',
                'morada' => 'required | max:255 | string',

            ];
        }
        else if ($this->tipo == "Personal")
        {
            return [
                'user_id' => 'required ',
                'dtNascimento' => 'required | date',
                'telefone' => 'required | min:9 | string',
                'morada' => 'required | max:255 | string',
                'atividade_id' => 'required',

            ];
        }
        else if($this->tipo == 'Funcionario')
        {
            return [
                'user_id' => 'required ',
                'telefone' => 'required | min:9 | string',
                'morada' => 'required | max:255 | string',
                'cargo' => 'required|string|max:255',
                'imagem' => 'required|image'

            ];
        }
    }


    public function mount()
    {
        $this->usersNC = User::Where('utype', 'PorConfirmar')->get();
        $this->mensalidades = Mensalidade::all();
        $this->atividades = Atividade::all();

    }

    public function rmvimg()
    {
        $this->reset(['imagem']);
    }

    public function mudar($id)
    {
        $this->user_id = $id;
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
        $user = User::findOrFail($this->user_id);

        if($this->tipo == "Cliente")
        {
            Cliente::create($this->validate());


            $user->utype = "Cliente";

            $user->save();
            
            $this->dispatch('cliente::created')->to(Clientes::class);
            $this->dispatch('notify', "O user: $user->name foi associado como cliente");
        }
        else if ($this->tipo == "Personal")
        {
            Personal::create($this->validate());

            $user->utype = "Personal";

            $user->save();
            
            $this->dispatch('personal::created')->to(UsersPersonal::class);
            $this->dispatch('notify', "O user: $user->name foi associado como Personal Trainer");
        }
        else if($this->tipo == 'Funcionario')
        {
            
            $this->validate();

            $nome = $this->imagem->getClientOriginalName();

            $foto = $this->imagem->storeAs('images', $nome, 'public');

            Funcionario::create([
                'telefone' => $this->telefone,
                'morada' => $this->morada,
                'cargo' => $this->cargo,
                'foto' => $foto,
                'user_id' => $this->user_id
            ]);

            $user->utype = "Funcionario";
            $user->save();

            $this->dispatch('funcionario::created')->to('funcionario.users.funcionario');
        }

        $this->usersNC = User::Where('utype', 'PorConfirmar')->get();
        $this->cancelar();   
    }
}
