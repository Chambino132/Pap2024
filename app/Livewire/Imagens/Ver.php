<?php

namespace App\Livewire\Imagens;

use App\Models\Fotos;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Ver extends Component
{
    public Collection $fotos;


    public function montar()
    {
        $this->fotos = Fotos::all();

        $count = 0;
        foreach($this->fotos as $foto)
        {
            if($foto->titulo == "hero1")
            {
                $this->fotos->forget($count);
            }

            if($foto->titulo == "hero2")
            {
                $this->fotos->forget($count);
            }

            if($foto->titulo == "hero3")
            {
                $this->fotos->forget($count);
            }
            
            if($foto->titulo == "videoImg")
            {
                $this->fotos->forget($count);
            }
            $count++;
        }
    }

    public function arquivar(Fotos $foto): void 
    {   
        $foto->arquivado = true;
        $foto->save();  

        $this->montar();
    }

    public function desarquivar(Fotos $foto): void 
    {   
        $foto->arquivado = false;
        $foto->save();  

        $this->montar();
    }


    public function mount() : void 
    {
        $this->montar();    
    }

    public function render()
    {
        return view('livewire.imagens.ver');
    }
}
