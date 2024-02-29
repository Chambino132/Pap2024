<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\Presenca;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On; 

class Clientes extends Component
{
    public Collection $usersC;
    public ?string $entrada;
    public ?int $cliente_id;

    protected $rules = [
        'cliente_id' => 'required',
        'entrada' => 'required',
    ];

    public function mount()
    {
        $this->usersC = User::Where('utype',"Cliente")->get();
    }
   
    public function render()
    {
        return view('livewire.funcionario.users.clientes');
    }

    #[On('cliente::created')]
    public function refresh() : void 
    {
        $this->usersC = User::Where('utype',"Cliente")->get();
    }

    public function saveEntrada($id)
    {
        $this->cliente_id = $id;
        $this->entrada = Carbon::now();

        Presenca::create($this->validate());
    }
}
