<?php

namespace App\Livewire\Sugestoes;

use App\Models\Reclamacao;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Ver extends Component
{
    public Collection $opinioes;

    public function mount()
    {
        $this->opinioes = Reclamacao::all();
    }

    public function delete($id) : void
    {
        $reclamacao = Reclamacao::findOrFail($id);
        $reclamacao->delete();
        $this->opinioes = Reclamacao::all();
    }

    public function arquivar(Reclamacao $opiniao) : void 
    {
        $opiniao->arquivado = true;
        $opiniao->save();
        $this->opinioes = Reclamacao::all();    
    }

    public function desarquivar(Reclamacao $opiniao) : void 
    {
        $opiniao->arquivado = false;
        $opiniao->save();
        $this->opinioes = Reclamacao::all();    
    }

    public function render()
    {
        return view('livewire.sugestoes.ver');
    }
}
