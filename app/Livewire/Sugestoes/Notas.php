<?php

namespace App\Livewire\Sugestoes;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Notas extends Component
{
    public Collection $notas;
    public function render()
    {
        return view('livewire.sugestoes.notas');
    }

    public function mount()
    {
        $this->notas = Nota::all();
    }
}
