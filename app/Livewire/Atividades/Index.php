<?php

namespace App\Livewire\Atividades;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.atividades.index')->layout('layouts.app');
    }
}
