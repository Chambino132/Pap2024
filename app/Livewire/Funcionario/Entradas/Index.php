<?php

namespace App\Livewire\Funcionario\Entradas;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Collection $clientes;

    public ?int $aTabela;
    public ?int $Idg;
    public ?Collection $cID;
    
    public function mount()
    {
        $this->clientes = Cliente::all();
    }

    public function IDCliente()
    {
        $this->cID = Cliente::where('id',$this->Idg)->get();
    }

    #[On('aTabela::changed')]
    public function render()
    {
        return view('livewire.funcionario.entradas.index');
    }
}
