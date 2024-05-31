<?php

namespace App\Livewire\Marcacao;

use App\Models\Marcacao;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModalMotivo extends ModalComponent
{

    public Marcacao $marcacao;
    public bool $adding;

    public string $motivo;

    protected $rules = [
        'motivo' => 'required|string|max:255'
    ]; 

    protected $messages = [
        'motivo.required' => 'Por favor insira o motivo',
        'motivo.string' => 'O motivo tem de ser um conjunto de caracteres',
        'motivo.max' => 'O motivo não pode ter mais de 255 caracteres'
    ];

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function guardarM()
    {
        $this->validate();

        $this->marcacao->motivo = $this->motivo;
        $this->marcacao->save();
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.marcacao.modal-motivo');
    }
}
