<?php

namespace App\Livewire\Marcacao;

use App\Models\Marcacao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Ver extends Component
{
    public Collection $marcacoes;

    public bool $EstadoChan = false;
    public string $estado = 'pendente';
    public int $iteration;

    public function mount()
    {
        $this->montar();
    }

    public function MudEstado(int $iter)
    {
        $this->iteration = $iter;
        $this->EstadoChan = true;
    }

    public function CanMud()
    {
        $this->reset(['iteration', 'EstadoChan']);
    }

    public function StoreEstado(Marcacao $marcacao)
    {
        
        $marcacao->estado = $this->estado;
        $marcacao->save();
        $this->montar();
        $this->EstadoChan = false;
    }


    public function Cancelar(Marcacao $marcacao)
    {
        $marcacao->estado = 'cancelado';
        $marcacao->save();
        $this->montar();
    }

    public function montar()
    {
        $this->marcacoes = new Collection();
        $allmarcacaos = Marcacao::all();


        foreach($allmarcacaos as $marcacao)
        {
            if(Auth::user()->utype == "Cliente")
            {
                if($marcacao->cliente->id == Auth::user()->cliente->id )
                {
                    $this->marcacoes->add($marcacao);
                }
            }
            else if(Auth::user()->utype == "Personal")
            {
                if($marcacao->personal->id == Auth::user()->personal->id)
                {
                    $this->marcacoes->add($marcacao);
                }
            }
        }
    }


    public function render()
    {
        return view('livewire.marcacao.ver');
    }
}
