<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Funcionario;
use LivewireUI\Modal\ModalComponent;

class FuncionarioModal extends ModalComponent
{
    public Funcionario $funcionario;
    public string $cargo;

    public bool $altering = false;

    protected $rules = [
        'cargo' => 'required|string|max:255',
    ];

    protected $messages = [
        'cargo.required' => 'Não deixe o cargo em branco',
        'cargo.string' => 'Tem que ser um conjunto de caracteres',
        'cargo.max' => 'Não pode ter mais de 255 caracters',
    ];


    public function altCarg(): void
    {
        $this->altering = true;
        $this->cargo = $this->funcionario->cargo;
    }

    public function cargChang() : void 
    {
        $this->validate();
        $this->funcionario->cargo = $this->cargo;
        $this->funcionario->save();
        $this->reset(['altering', 'cargo']);
    }

    public function render()
    {
        return view('livewire.funcionario.users.funcionario-modal');
    }
}
