<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Equipamento;
use App\Livewire\Funcionario\Equipamento\Base;

class AlterarEquip extends Component
{
    public Equipamento $altEquipamento;

    public ?string $equipamento;
    public ?string $dtAquisicao;
    public ?string $preco;

    protected $rules = [
        'dtAquisicao' => 'required|date',
        'preco' => 'required|int',
        'equipamento' => 'required|string|max:255',
    ];

    protected $messages = [
        'dtAquisicao.required' => 'A Data de Aquisição é obrigatoria',
        'dtAquisicao.date' => 'A Data de Aquisição tem de ser uma data valida',
        'preco.required' => 'O Preço é obrigatoria',
        'preco.int' => 'O Preço tem de ser um conjunto de numeros',
        'equipamento.required' => 'O Nome do Equipamento é obrigatoria',
        'equipamento.string' => 'O Nome do Equipamento tem de ser um conjusto de caracteres',
        'equipamento.max' => 'O nome do Equipamento tem de ter no maximo 255 caracteres',
    ];

    

    public function guardarE()
    {
        $this->altEquipamento->update($this->validate());
        $this->dispatch('resetar::component')->to('funcionario.equipamento.base');
        $this->dispatch('notify', "Equipamento alterado com sucesso!");
    }


    public function mount() : void 
    {
        $this->equipamento = $this->altEquipamento->equipamento;
        $this->dtAquisicao = $this->altEquipamento->dtAquisicao;
        $this->preco = $this->altEquipamento->preco;    
    }

    public function render()
    {
        return view('livewire.funcionario.equipamento.alterar-equip');
    }
}
