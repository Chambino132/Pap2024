<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Problema;
use App\Models\Equipamento;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

use Illuminate\Database\Eloquent\Collection;

class Base extends Component
{
    public Collection $maquinas;
    public bool $alterar = false;
    public bool $alterarC = false;
    public bool $altProblema = false;
    public bool $addP = false;
    public bool $repeted = false;
    public ?Equipamento $mID;
    public ?Equipamento $mIDd;
    public ?string $tipo;
    public string $SelProblema;
    public Problema $Tempproblema;
    public ?string $altguard = '';
    public string $aba = "Ver";

    public bool $notified = false;

    public string $message = "Guardado com sucesso!";

    public ?string $dtAquisicao;
    public ?int $preco;
    public ?string $equipamento;
    public ?string $problema;
    public string $equipamento_id = "";
    public ?string $estado;

    public Equipamento $altEquipamento;


    

    #[On('equipamento::delete')]
    public function refresh()
    {
        $this->maquinas = Equipamento::all();
        session() ->flash('sucesso', 'O Equipamento foi Deletado com sucesso!');
        return redirect(request()->header('Referer'));
    }

    #[On('openModal')]
    public function work() 
    {
        $this->dispatch('notify');
    }

    

    #[On('problema::delete')]
    public function probDelete()
    {
        session()->flash('sucesso', 'O Problema foi Deletado com sucesso!');
        return redirect(request()->header('Referer'));
    }


    #[On('alterar')]
    public function mudar(Equipamento $equipamento)
    {
        $this->aba = "Alterar";
        $this->altEquipamento = $equipamento;
    }

    #[On('adicionar')]
    public function mudarC()
    {
        $this->aba = "Adicionar";
        $this->alterarC = true;
        
    }
    
    #[On('add')]
    public function add($equipamento)
    {
        $this->aba = "AddProb";
        $this->equipamento_id = $equipamento;
    }

    #[On('resetar::component')]
    public function resetar()
    {
        $this->reset();
        $this->maquinas = Equipamento::all();
    }


    #[On('cancelar')]
    public function cancelar()
    {
        return redirect(request()->header('Referer'));
    }

    

    

    

    

    
    
    
    public function render()
    {
        return view('livewire.funcionario.equipamento.base');

        
    }
}
