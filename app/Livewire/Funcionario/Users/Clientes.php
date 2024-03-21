<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Presenca;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;

    public ?string $entrada;
    public ?int $cliente_id;

    public int $perPage = 10;
    public string $search = '';
    public bool $ordena = false;

    protected $rules = [
        'cliente_id' => 'required',
        'entrada' => 'required',
    ];

    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('clientePage');
    }

    function ordenar() : void 
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

    public function montar() 
    {
        if($this->ordena)
        {
            $usersC = User::query()
            ->where('utype',"Cliente")
            ->where('name', 'like', '%' .$this->search. '%')
            ->orderBy('name')
            ->paginate($this->perPage, ['*'], 'clientesPage');
        }
        else
        {
            $usersC = User::query()
            ->where('utype',"Cliente")
            ->where('name', 'like', '%' .$this->search. '%')
            ->paginate($this->perPage, ['*'], 'clientePage');
        }

        return $usersC;
    }
   
    public function render()
    {
        $usersC = $this->montar();

        return view('livewire.funcionario.users.clientes', compact('usersC'));
    }

    public function saveEntrada($id)
    {
        $this->cliente_id = $id;
        $this->entrada = Carbon::now();

        Presenca::create($this->validate());
        $this->dispatch('novaEntrada')->to('funcionario.entradas.index');
    }
}
