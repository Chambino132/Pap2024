<?php

namespace App\Livewire\Planos;

use App\Models\Exercicio;
use App\Models\Plano;
use LivewireUI\Modal\ModalComponent;

class ExercicioPlano extends ModalComponent
{
    public ?Plano $plano;

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function render()
    {
        return view('livewire.planos.exercicio-plano');
    }

    public function dessassociar(Exercicio $exercicio)
    {
        $this->plano->exercicios()->detach($exercicio);
        $this->dispatch('notify', 'O Exercicio foi dessassociado com sucesso deste Plano!');
    }
}
