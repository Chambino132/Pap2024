<?php

namespace App\Livewire\Planos;

use App\Models\Exercicio;
use App\Models\Plano;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class PlanoAddprob extends ModalComponent
{
    public Collection $exercicios;

    public ?Plano $plano;

    public string $exercicio_id;
    public string $repeticoes;

    protected $rules = [
        'exercicio_id' => 'required',
        'repeticoes' => 'required',
    ];

    public function render()
    {
        return view('livewire.planos.plano-addprob');
    }

    public function mount()
    {
        $planoID = $this->plano->id;

        $this->exercicios = Exercicio::whereDoesntHave('planos', function($query) use ($planoID){
            $query->where('plano_id', $planoID);
        })->get();
    }

    public function salvar()
    {
        $this->validate();

        $this->plano->exercicios()->attach($this->exercicio_id, ['repeticoes' => $this->repeticoes]);

        $this->dispatch('closeModal');
        $this->dispatch('notify', 'Problema adicionados com sucesso ao Plano!');
    }
}
