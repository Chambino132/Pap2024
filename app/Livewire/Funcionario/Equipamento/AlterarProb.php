<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Equipamento;
use App\Models\Problema;
use Livewire\Attributes\On;

class AlterarProb extends Component
{
    public Equipamento $equipamento;
    public string $problema_id;
    public Problema $Tempproblema;

    public ?string $problema;
    public ?string $estado;
    public string $equipamento_id;

    public bool $altProblema;
    public bool $repeted = false;

    public string $message = '';

    protected $rules = [
        'problema' => 'required | string | max:255',
        'estado' => 'required | string',
        'equipamento_id' => 'required',
    ];

    protected $messages = [
        'problema.required' => 'O Problema é obrigatorio', 
        'problema.string' =>  'O Problema tem de ser um conjuto de caracteres',
        'problema.max' => 'O Problema tem de ter no maximo 255 caracteres',
        'estado.required' => 'O Estado é obrigatorio',
        'estado.string' => 'O Problema tem de ser um conjuto de caracteres',
    ];

    public function retroceder()
    {
        $this->altProblema = false;
        $this->repeted = true;
    }

    public function guardarP()
    {
        $this->equipamento_id = $this->equipamento->id;
        $this->Tempproblema->update($this->validate());
        $this->dispatch('resetar::component')->to('funcionario.equipamento.base');
        $this->dispatch('notify', $this->message);
        $this->reset(['message']);
    }

    #[On('SelProblema::changed')]
    public function altProblema()
    {
        $this->altProblema = true;
        $this->Tempproblema = Problema::findOrFail($this->problema_id);
        $this->problema = $this->Tempproblema->problema;
        $this->estado = $this->Tempproblema->estado;
    }

    public function mount() : void 
    {
        $this->message = "Problema alterado com sucesso!";
    }

    public function render()
    {
        return view('livewire.funcionario.equipamento.alterar-prob');
    }
}
