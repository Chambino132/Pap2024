<?php

namespace App\Livewire\Planos;

use App\Mail\PlanoConfirmado;
use App\Models\Cliente;
use App\Models\Plano;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ConfirmCompra extends Component
{
    public Cliente $cliente;
    public Plano $plano;

    public function confirmar(): Redirector 
    {
        $this->cliente->planos()->syncWithoutDetaching([$this->plano->id]);

        Mail::to($this->cliente->user->email)->send(new PlanoConfirmado);
        session()->flash('sucesso', 'A Compra foi confirmada com sucesso!');
        return redirect(route('planos'));   
    }

    public function render()
    {
        return view('livewire.planos.confirm-compra');
    }
}
