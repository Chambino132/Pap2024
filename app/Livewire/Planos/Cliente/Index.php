<?php

namespace App\Livewire\Planos\Cliente;

use App\Mail\PlanoComprado;
use App\Models\Plano;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Index extends Component
{
    public Collection $planos;
    

    public function render()
    {
        return view('livewire.planos.cliente.index');
    }

    public function mount()
    {
        $clienteID = Auth::user()->cliente->id;

        $this->planos = Plano::whereDoesntHave('clientes', function($query) use ($clienteID)
        {
            $query->where('cliente_id', $clienteID);
        })->get();
    }

    public function comprar($plano) : void 
    {
        $admins = User::where('utype', 'Admin')->get();
            
            $data = [
                'cliente_id' => Auth::user()->cliente->id,
                'nome' => Auth::user()->name,
                'plano_id' => $plano,
            ];

        foreach($admins as $admin)
        {
            Mail::to($admin->email)->send(new PlanoComprado($data));
        }
    }
}
