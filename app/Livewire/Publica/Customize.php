<?php

namespace App\Livewire\Publica;

use App\Models\Fotos;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Customize extends Component
{
    public Collection $fotos;
    public Fotos $hero1 = false;
    public Fotos $hero2 = false;
    public Fotos $hero3 = false;
    public Fotos $videoImg = false;

    public function mount(): void
    {
        $this->fotos = Fotos::all();
        $this->hero1 = Fotos::where('titulo', 'hero1')->get()->first();
        $this->hero2 = Fotos::where('titulo', 'hero2')->get()->first();
        $this->videoImg = Fotos::where('titulo', 'videoImg')->get()->first();
        $this->hero3 = Fotos::where('titulo', 'hero3')->get()->first();
    }

    public function render()
    {
        return view('livewire.publica.customize')->layout('layouts.app');
    }
}
