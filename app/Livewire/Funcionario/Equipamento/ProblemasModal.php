<?php

namespace App\Livewire\Funcionario\Equipamento;

use App\Models\Equipamento;
use App\Models\Problema;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class ProblemasModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return '6xl';
    }
    public Equipamento $maquina;
    public Problema $problema;

    public function render()
    {  
        return view('livewire.funcionario.equipamento.problemas-modal');
    }

    public function delete($id)
    {
        $this->problema = Problema::findOrFail($id);
        
        $this->problema->delete();
        $this->reset($this->problema);
    }
}
