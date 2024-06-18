<?php

namespace App\Livewire\Calendario;

use Livewire\Component;

class Index extends Component
{
    public function render() 
    {
        return view('livewire.calendario.index')->layout('layouts.app');
    }
}
