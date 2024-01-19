<?php

namespace App\Livewire\Funcionario\Equipamento;

use App\Models\Equipamento;
use App\Models\Problema;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class Base extends Component
{
    public Collection $maquinas;
    public bool $alterar = false;
    public bool $alterarC = false;
    public bool $altProblema = false;
    public bool $addP = false;
    public ?Equipamento $mID;
    public ?string $tipo;
    public string $SelProblema;
    public Problema $Tempproblema;
    public string $altguard;

    public ?string $dtAquisicao;
    public ?int $preco;
    public ?string $equipamento;
    public ?string $problema;
    public string $equipamento_id = "";
    public ?string $estado;


    public function mount()
    {
        $this->maquinas = Equipamento::all();
    }

    public function rules()
    {
        
            if($this->altguard == "Equipamento")
            {
                return [
                    'dtAquisicao' => 'required | date',
                    'preco' => 'required | int',
                    'equipamento' => 'required | string | max:255',
                ];
            }
            else if ($this->altguard == "Problema")
            {
                return [
                    'problema' => 'required | string | max:255',
                    'estado' => 'required | string',
                    'equipamento_id' => 'required',
                ];
            }
       
    }

    public function mudar($id)
    {
        $this->mID = Equipamento::findOrFail($id);
        $this->dtAquisicao = $this->mID->dtAquisicao;
        $this->preco = $this->mID->preco;
        $this->equipamento = $this->mID->equipamento;
        $this->alterar = true;
        $this->altguard = "Equipamento";
    }

    public function mudarC()
    {
        $this->alterarC = true;
        $this->altguard = "Equipamento";
    }

    public function add($id)
    {
        $this->equipamento_id = $id;
        $this->addP = true;
        $this->altguard = "Problema";
    }

    public function cancelarC()
    {
        $this->alterarC = false;
    }

    public function cancelarP()
    {
        $this->addP = false;
    }


    public function cancelar()
    {
        $this->reset();
        $this->maquinas = Equipamento::all();
    }

    public function guardarE()
    {
        $this->mID->update($this->validate());
        
        $this->cancelar();
    }

    public function guardarP()
    {
        $this->Tempproblema->update($this->validate());

        $this->cancelar();
    }

    public function Salvar()
    {
        Equipamento::create($this->validate());

        $this->cancelar();
    }

    public function salvarP()
    {
        Problema::create($this->validate());
        $this->cancelar();
    }

    public function retroceder()
    {
        $this->altProblema = false;
    }

    #[On('SelProblema::changed')]
    public function altProblema()
    {
        $this->altProblema = true;
        $this->Tempproblema = Problema::findOrFail($this->SelProblema);
        $this->problema = $this->Tempproblema->problema;
        $this->estado = $this->Tempproblema->estado;
    }
    
    #[On('tipo::changed')]
    public function render()
    {
        return view('livewire.funcionario.equipamento.base');
    }
}
