<?php

namespace App\Livewire\Pb;

use App\Models\Best;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Void_;

class Ver extends Component
{
    use WithPagination;

    public string $class = 'overflow-y-auto';

    public string $iteration;
    public Best $best;
    public bool $isUpdating = false;

    public string $newPB;

    protected $rules = [
        'newPB' => 'required|int',
    ];

    #[On('change::class')]
    public function changeClassAuto(): void
    {
        $this->class = 'overflow-y-auto';
    }
    
    public function changeClass(): void
    {
        $this->class = 'overflow-visible';
    }

    public function alterar($iteration, Best $best)
    {
        $this->iteration = $iteration;
        $this->best = $best;
        $this->isUpdating = true;
        $this->newPB = $best->pb;
    }

    public function update(): void 
    {
        $this->validate();

        $this->best->pb = $this->newPB;
        $this->best->save();

        $this->reset([
            'iteration',
            'isUpdating',
            'newPB',
            'best',
        ]);

        $this->dispatch('notify', 'PB atualizado com sucesso');
    }

    public function CanMud(): void
    {
        $this->reset([
            'iteration',
            'isUpdating',
            'newPB',
            'best',
        ]);
    }

    public function render()
    {
        $pbs = Best::where('cliente_id', Auth::user()->cliente->id)->paginate(5, ['*'], 'pbPage');

        return view('livewire.pb.ver', compact('pbs'));
    }
}
