<?php

namespace App\Livewire\Sugestoes;

use App\Models\Reclamacao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Ver extends Component
{
    public Collection $opinioes;

    public function mount()
    {
        $this->opinioes = Reclamacao::all();
        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
    }

    #[On('sugestao::delete')]
    public function refresh()
    {
        session()->flash('sucesso', 'Sugestão deletada!');
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.sugestoes.ver');
    }
}
