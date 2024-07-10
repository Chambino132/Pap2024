<?php

namespace App\Livewire\Funcionario\Users;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Personal;
use App\Models\Atividade;
use App\Models\Funcionario;
use App\Models\Mensalidade;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Livewire\Funcionario\Users\Personal as UsersPersonal;
use Illuminate\Support\Facades\Hash;

class NaoConfirmado extends Component
{
    use WithFileUploads, WithPagination;


    public string $class = "overflow-y-auto";

    public int $perPage = 10;
    public string $search = '';
    public bool $ordena = false;

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
    public ?string $cargo;
    public $imagem;


    protected $messages = [
        'user_id.required' => "O utilizador é obrigatorio",
        'tipo.required' => "O tipo de utilizador é obrigatorio",
        'NIF.required' => "O NIF é obrigatorio",
        'NIF.digits' => "O NIF só pode ter 9 digitos",
        'NIF.numeric' => "O NIF tem de ser um conjunto de numeros",
        'dtNascimento.required' => "A Data de Nascimento é obrigatoria",
        'dtNascimento.date' => "A Data de Nascimento tem de ser uma data",
        'telefone.required' => "O Telefone é obrigatorio",
        'telefone.min' => "O Telefone tem de ter no minimo 9 digitos",
        'telefone.numeric' => "O Telefone tem de ser um conjunto de numeros",
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
                'NIF' => 'required | digits:9 | numeric',
                'dtNascimento' => 'required | date',
                'telefone' => 'required | min:9 | numeric',
                'morada' => 'required | max:255 | string',

            ];
        }
        else if ($this->tipo == "Personal")
        {
            return [
                'user_id' => 'required ',
                'dtNascimento' => 'required | date',
                'telefone' => 'required | min:9 | numeric',
                'morada' => 'required | max:255 | string',
                'atividade_id' => 'required',

            ];
        }
        else if($this->tipo == 'Funcionario')
        {
            return [
                'user_id' => 'required ',
                'telefone' => 'required | min:9 | numeric',
                'morada' => 'required | max:255 | string',
                'cargo' => 'required|string|max:255',
                'imagem' => 'required|image'

            ];
        }
    }


    public function mount()
    {
        $this->mensalidades = Mensalidade::all();
        $this->atividades = Atividade::all();
    }

    #[On('change::class')]
    public function changeClassAuto(): void
    {
        $this->class = 'overflow-y-auto';
    }
    
    public function changeClass(): void
    {
        $this->class = 'overflow-y-visible';
    }

    public function ordenar() : void
    {
        if($this->ordena)
        {
            $this->ordena = false;
        }
        else
        {
            $this->ordena = true;
        }   
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
        'imagem',
        'cargo',
        ]);
    }

    public function montar()
    {
        if($this->ordena)
        {
            $usersNC = User::query()
            ->where('utype', 'PorConfirmar')
            ->where('name', 'like', '%'. $this->search.'%')
            ->orderBy('name')
            ->paginate($this->perPage, ['*'], 'naoconfirmadoPage');
        }
        else
        {
            $usersNC = User::query()
            ->where('utype', 'PorConfirmar')
            ->where('name', 'like', '%'. $this->search.'%')
            ->paginate($this->perPage, ['*'], 'naoconfirmadoPage');
        }

        return $usersNC;
    }
    
    #[On('tipo::changed')]
    public function render()
    {
        $usersNC = $this->montar();

        return view('livewire.funcionario.users.nao-confirmado', compact('usersNC'));
    }

    public function guardar()
    {
        $user = User::findOrFail($this->user_id);

        if($this->tipo == "Cliente")
        {
            $this->validate();
            
            $ultMes = Carbon::now();

            Cliente::create([
                'mensalidade_id' => $this->mensalidade_id,
                'dtNascimento' => $this->dtNascimento,
                'NIF' => $this->NIF,
                'telefone' => $this->telefone,
                'morada' => $this->morada,
                'ultMes' => $ultMes,
                'user_id' => $user->id,
                'hash' => Hash::make($user->id),
            ]);

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

        $this->cancelar();   
    }
}
