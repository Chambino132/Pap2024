<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Informacoes extends Component
{
    public $cliente;

    public bool $estEdit = false;

    public $telefone;

    public $Morada;

    protected $rules = [
        'telefone' => 'required|min:9',
        'Morada'   => 'required|string|max:255',
    ];

    protected $messages = [
        'telefone.required' => 'O telefone é obrigratorio',
        'Morada.required'   => 'A Morada é obrigratoria',
        'telefone.min'      => 'O telefone tem de ter no minimo 9 digitos',
        'Morada.string'     => 'A Morada tem de ser um conjunto de caracteres',
        'Morada.max'        => 'A Morada tem de ter no maximo 255 caracteres',
    ];

    public function render(): View
    {
        return view('livewire.cliente.informacoes');
    }

    public function mount(): void
    {

        $this->cliente = Cliente::where('user_id', Auth::user()->id)->get()->first();

    }

    public function edit(): void
    {
        $this->estEdit  = true;
        $this->telefone = $this->cliente->pluck('telefone')->first();
        $this->Morada   = $this->cliente->pluck('Morada')->first();
    }

    public function cancel(): void
    {
        $this->estEdit = false;
        $this->cliente = Cliente::where('user_id', Auth::user()->id)->get()->first();
    }

    public function update(): void
    {
        $id = $this->cliente->pluck('id')->firstOrFail();

        Cliente::find($id)->update($this->validate());

        $this->cancel();
    }

}
