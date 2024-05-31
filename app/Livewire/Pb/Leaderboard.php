<?php

namespace App\Livewire\Pb;

use App\Models\Best;
use App\Models\Equipamento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Leaderboard extends Component
{
    public Collection $equipamentos;
    public int $equipamento;

    public function mount()
    {
        $this->equipamentos = Equipamento::all();
        $this->equipamento = Equipamento::first()->id;
    }

    public function render()
    {
        // $leaderboard = Best::all();
        $leaderboard = Best::where('equipamento_id', $this->equipamento)->orderBy('pb', 'DESC')->paginate(15);

        return view('livewire.pb.leaderboard', compact('leaderboard'));
    }
}
