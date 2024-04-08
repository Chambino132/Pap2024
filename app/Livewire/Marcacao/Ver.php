<?php

namespace App\Livewire\Marcacao;

use Livewire\Component;
use App\Models\Marcacao;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class Ver extends Component
{

    public bool $EstadoChan = false;
    public string $estado = 'pendente';
    public int $iteration;

    public int $perPage = 10;
    public string $search = '';
    public string $ordena = '';
    public string $est = 'todos';

    public string $class = 'overflow-y-auto';

    public function MudEstado(int $iter)
    {
        $this->iteration = $iter;
        $this->EstadoChan = true;
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

    public function CanMud()
    {
        $this->reset(['iteration', 'EstadoChan']);
    }

    public function StoreEstado(Marcacao $marcacao)
    {   
        $marcacao->estado = $this->estado;
        $marcacao->save();
        $this->EstadoChan = false;
    }


    public function Cancelar(Marcacao $marcacao)
    {
        $marcacao->estado = 'cancelado';
        $marcacao->save();
    }



    public function render()
    {
        
            if($this->est == 'todos')
            {
                if(Auth::user()->utype == "Cliente")
                {
                    $marcacoes = Auth::user()->cliente->marcacaos()
                    ->join('personals', 'marcacaos.personal_id', 'personals.id')
                    ->join('atividades', 'personals.atividade_id', 'atividades.id')
                    ->join('users', 'personals.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('atividades.atividade','like', '%' .$this->search. '%');
                    })
                    ->select('marcacaos.id as id', 'marcacaos.dia as dia', 'marcacaos.hora as hora', 'users.name as name', 'marcacaos.estado as estado', 'atividades.atividade')
                    ->orderby('dia', 'DESC')
                    ->paginate($this->perPage, ['*'], 'marcacoesPage');
                }
                else
                {
                    $marcacoes = Auth::user()->personal->marcacaos()
                    ->join('personals', 'marcacaos.personal_id', 'personals.id')
                    ->join('atividades', 'personals.atividade_id', 'atividades.id')
                    ->join('clientes', 'marcacaos.cliente_id', 'clientes.id')
                    ->join('users', 'clientes.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('atividades.atividade','like', '%' .$this->search. '%');
                    })
                    ->select('marcacaos.id as id', 'marcacaos.dia as dia', 'marcacaos.hora as hora', 'users.name as name', 'marcacaos.estado as estado', 'atividades.atividade')
                    ->orderby('dia', 'DESC')
                    ->paginate($this->perPage, ['*'], 'marcacoesPage');
                }
            }
            else
            {
                if(Auth::user()->utype == "Cliente")
                {
                    $marcacoes = Auth::user()->cliente->marcacaos()
                    ->join('personals', 'marcacaos.personal_id', 'personals.id')
                    ->join('atividades', 'personals.atividade_id', 'atividades.id')
                    ->join('users', 'personals.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('atividades.atividade','like', '%' .$this->search. '%');
                    })
                    ->where('estado', $this->est)
                    ->select('marcacaos.id as id', 'marcacaos.dia as dia', 'marcacaos.hora as hora', 'users.name as name', 'marcacaos.estado as estado', 'atividades.atividade')
                    ->orderby('dia', 'DESC')
                    ->paginate($this->perPage, ['*'], 'marcacoesPage');
                }
                else
                {
                    $marcacoes = Auth::user()->personal->marcacaos()
                    ->join('personals', 'marcacaos.personal_id', 'personals.id')
                    ->join('atividades', 'personals.atividade_id', 'atividades.id')
                    ->join('clientes', 'marcacaos.cliente_id', 'clientes.id')
                    ->join('users', 'clientes.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('atividades.atividade','like', '%' .$this->search. '%');
                    })
                    ->where('estado', $this->est)
                    ->select('marcacaos.id as id', 'marcacaos.dia as dia', 'marcacaos.hora as hora', 'users.name as name', 'marcacaos.estado as estado', 'atividades.atividade')
                    ->orderby('dia', 'DESC')
                    ->paginate($this->perPage, ['*'], 'marcacoesPage');
                }
            }
        

        return view('livewire.marcacao.ver', compact('marcacoes'));
    }
}
