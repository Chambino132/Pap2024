<?php

namespace App\Livewire\Funcionario\Equipamento;

use Livewire\Component;
use App\Models\Equipamento;

class AdicionarEquip extends Component
{

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


    public function Salvar()
    {
        $this->validate();

        Equipamento::create([
            'equipamento' => $this->equipamento,
            'dtAquisicao' => $this->dtAquisicao,
            'preco' => $this->preco,
        ]);
        $this->dispatch('resetar::component')->to('funcionario.equipamento.base');
        $this->dispatch('notify', "Equipamento adicionado com sucesso!");
        
    }


    public function render()
    {
        return view('livewire.funcionario.equipamento.adicionar-equip');
    }
}
