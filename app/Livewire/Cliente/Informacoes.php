<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Informacoes extends Component
{
    public $cliente;

    public bool $estEdit = false;

    public $telefone;

    public $morada;

    protected $rules = [
        'telefone' => 'required|min:9',
        'morada'   => 'required|string|max:255',
    ];

    protected $messages = [
        'telefone.required' => 'O telefone é obrigratorio',
        'morada.required'   => 'A Morada é obrigratoria',
        'telefone.min'      => 'O telefone tem de ter no minimo 9 digitos',
        'morada.string'     => 'A Morada tem de ser um conjunto de caracteres',
        'morada.max'        => 'A Morada tem de ter no maximo 255 caracteres',
    ];

    public function render(): View
    {
        return view('livewire.cliente.informacoes');
    }

    public function mount(): void
    {

        $this->cliente = Cliente::where('user_id', Auth::user()->id)->get()->first();

    }

    public function QrCode(): void
    {
        $hash = $this->cliente->hash;

        $app = config('app.url');

        $this->dispatch('openModal',  'qr-code.qr-modal', ['link' => "$app/entradas/$hash"]);
    }

    public function edit(): void
    {
        $this->estEdit  = true;
        $this->telefone = $this->cliente->pluck('telefone')->first();
        $this->morada   = $this->cliente->pluck('morada')->first();
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
