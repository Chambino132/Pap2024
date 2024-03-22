<?php

namespace App\Livewire\Funcionario\Entradas;

use Carbon\Carbon;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Presenca;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public string $firstDate = '';
    public string $lastDate = '';
    public string $ordena = '';
   


    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('entradasPage');
    }

    #[On('novaEntrada')]
    public function novaEntrada()
    {
        session()->flash('sucesso', 'A Entrada foi registada com sucesso');
        return redirect(request()->header('Referer'));
    }

    public function mount()
    {
        $this->montar();
    }

    public function ordenar($campo)
    {
        if($this->ordena == $campo)
        {
            $this->ordena = '';
        }
        else
        {
            $this->ordena = $campo;
        }
    }


    public function montar()
    {
        $this->lastDate = Carbon::now();

        $tempEntradas = Presenca::all();
        $counter = 0;

        foreach($tempEntradas as $entrada)
        {
            if( $counter == 0) 
            {
                
                $this->firstDate = Carbon::parse($entrada->entrada)->format('Y-m-d H:i:s');
            }
                 
            $counter = $counter + 1;
        }
    }
    
    public function render()
    {
       
        if($this->ordena == 'nome')
        {
            $entradas = Presenca::query()
            ->join('clientes', 'presencas.cliente_id', 'clientes.id')
            ->join('users', 'clientes.user_id', 'users.id')
            ->where('users.name', 'like', '%'.$this->search.'%')
            ->whereBetween('entrada', [$this->firstDate, $this->lastDate])
            ->orderBy('name')
            ->paginate($this->perPage, ['*'], 'entradasPage');
        }
        else if ($this->ordena == 'data')
        {
            $entradas = Presenca::query()
            ->join('clientes', 'presencas.cliente_id', 'clientes.id')
            ->join('users', 'clientes.user_id', 'users.id')
            ->where('users.name', 'like', '%'.$this->search.'%')
            ->whereBetween('entrada', [$this->firstDate, $this->lastDate])
            ->orderBy('entrada')
            ->paginate($this->perPage, ['*'], 'entradasPage');
        }
        else
        {
            $entradas = Presenca::query()
            ->join('clientes', 'presencas.cliente_id', 'clientes.id')
            ->join('users', 'clientes.user_id', 'users.id')
            ->where('users.name', 'like', '%'.$this->search.'%')
            ->whereBetween('entrada', [$this->firstDate, $this->lastDate])
            ->orderBy('entrada' , 'desc')
            ->paginate($this->perPage, ['*'], 'entradasPage');
        }
        
        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }

        return view('livewire.funcionario.entradas.index', compact('entradas'));
    }
}
