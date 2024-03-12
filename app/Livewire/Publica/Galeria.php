<?php

namespace App\Livewire\Publica;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Galeria extends Component
{   
    public ?Collection $fotos = null;

    public function render()
    {
        return view('livewire.publica.galeria');
    }
}
