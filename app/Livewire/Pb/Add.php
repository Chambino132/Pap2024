<?php

namespace App\Livewire\Pb;

use App\Models\Best;
use Livewire\Component;
use App\Models\Equipamento;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Add extends Component
{
    public array $equipamentos;

    public string $equipamento_id;
    public string $pb;
    public string $cliente_id;

    protected $rules = [
        'pb' => 'required|int',
        'equipamento_id' => 'required',
        'cliente_id' => '',
    ];

    public function guardar() : Redirector
    {
        $this->cliente_id = Auth::user()->cliente->id;

        Best::create($this->validate());

        session()->flash('sucess', 'PB registado com sucesso');
       return redirect(route('dashboard'));
    }


    public function mount() : void 
    {
        $this->equipamentos = array();
        $query = Equipamento::all();
        $bests = Best::where('cliente_id', Auth::user()->cliente->id)->get();
        $proced = true;

        foreach ($query as $value) {
            foreach ($bests as $item) {
                if ($value->id == $item->equipamento_id) 
                {
                    $proced = false;
                }
            }
            if ($proced) 
            {
                array_push($this->equipamentos, $value);
            }
            $proced = true;
        }
    
    }

    public function render()
    {  
        if (session('sucesso')) 
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
        return view('livewire.pb.add');
    }
}
