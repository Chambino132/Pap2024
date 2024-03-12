<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Problema;
use App\Models\Equipamento;

class AdicionarProb extends Component
{
    public ?string $problema;
    public ?string $estado;
    public string $equipamento_id;

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

    public function salvarP()
    {
        Problema::create($this->validate());
        $this->dispatch('resetar::component');
        $this->dispatch('notify', "Problema adicionado com sucesso!");
    }

    public function render()
    {
        return view('livewire.funcionario.equipamento.adicionar-prob');
    }
}
