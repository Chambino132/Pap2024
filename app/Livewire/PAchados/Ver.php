<?php

namespace App\Livewire\PAchados;

use Livewire\Component;
use App\Models\Perdidos;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Ver extends Component
{
    use WithPagination;

    public string $search = '';
    public string $estado = "todos";
    public int $perPage = 10;
    public string $ordena = "";
    public string $class = 'overflow-y-auto';

    #[On('change::class')]
    public function changeClassAuto(): void
    {
        $this->class = 'overflow-y-auto';
    }
    
    public function changeClass(): void
    {
        $this->class = 'overflow-visible';
    }

    public function ordenar($por)
    {
        if($this->ordena == $por)
        {
            $this->ordena = '';
        }
        else
        {
            $this->ordena = $por;
        }
    }

    public function mudarEstado(Perdidos $perdido)
    {
            $perdido->estado = "devolvido";
            $perdido->save(); 
    }

    public function render()
    {
        if($this->estado == 'todos')
        {
            if($this->ordena == '')
            {
                $perdidos = Perdidos::where('item', 'like', "%". $this->search ."%")
                    ->paginate($this->perPage);
            }
            else
            {
                $perdidos = Perdidos::where('item', 'like', "%". $this->search ."%")
                    ->orderBy($this->ordena)
                    ->paginate($this->perPage);
            }
        }
        else
        {
            if($this->ordena == '')
            {
                $perdidos = Perdidos::where('item', 'like', "%". $this->search ."%")
                    ->where('estado', $this->estado)
                    ->paginate($this->perPage);
            }
            else
            {
                $perdidos = Perdidos::where('item', 'like', "%". $this->search ."%")
                    ->where('estado', $this->estado)
                    ->orderBy($this->ordena)
                    ->paginate($this->perPage);
            }
        }

        return view('livewire.p-achados.ver', compact('perdidos'));
    }
}
