<?php

namespace App\Livewire\Imagens;

use App\Models\Fotos;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;

class Ver extends Component
{   
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public string $ordena = '';
    public string $arquivado = 'todos';

    #[On('pagination::updated')]
    public function updatingSearch(): Void
    {
        $this->resetPage('fotosPage');
    }


    public function montar()
    {
        if($this->ordena == 'titulo')
        {
            switch($this->arquivado)
            {
                case 'todos':
                    $fotos = Fotos::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->whereNot('titulo', 'hero1')
                    ->whereNot('titulo', 'hero2')
                    ->whereNot('titulo', 'videoImg')
                    ->whereNot('titulo', 'hero3')
                    ->orderby('titulo')
                    ->paginate($this->perPage, ['*'], 'fotosPage');
                    break;
                case 'arquivados':
                    $fotos = Fotos::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->where('arquivado', false)
                    ->whereNot('titulo', 'hero1')
                    ->whereNot('titulo', 'hero2')
                    ->whereNot('titulo', 'videoImg')
                    ->whereNot('titulo', 'hero3')
                    ->orderby('titulo')
                    ->paginate($this->perPage, ['*'], 'fotosPage');
                    break;
                case 'nao arquivados':
                    $fotos = Fotos::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->whereNot('titulo', 'hero1')
                    ->whereNot('titulo', 'hero2')
                    ->whereNot('titulo', 'videoImg')
                    ->whereNot('titulo', 'hero3')
                    ->where('arquivado', true)
                    ->orderby('titulo')
                    ->paginate($this->perPage, ['*'], 'fotosPage');
                    break;
            }
 
        }
        else
        {
            switch($this->arquivado)
            {
                case 'todos':
                    $fotos = Fotos::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->whereNot('titulo', 'hero1')
                    ->whereNot('titulo', 'hero2')
                    ->whereNot('titulo', 'videoImg')
                    ->whereNot('titulo', 'hero3')
                    ->paginate($this->perPage, ['*'], 'fotosPage');
                    break;
                case 'arquivados':
                    $fotos = Fotos::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->whereNot('titulo', 'hero1')
                    ->whereNot('titulo', 'hero2')
                    ->whereNot('titulo', 'videoImg')
                    ->whereNot('titulo', 'hero3')
                    ->where('arquivado', false)
                    ->paginate($this->perPage, ['*'], 'fotosPage');
                    break;
                case 'nao arquivados':
                    $fotos = Fotos::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->whereNot('titulo', 'hero1')
                    ->whereNot('titulo', 'hero2')
                    ->whereNot('titulo', 'videoImg')
                    ->whereNot('titulo', 'hero3')
                    ->where('arquivado', true)
                    ->paginate($this->perPage, ['*'], 'fotosPage');
                    break;
            }
        }
    
        return $fotos;
    }



    public function ordenar(): void 
    {
        if($this->ordena == 'titulo')
        {
            $this->ordena = '';
        }    
        else
        {
            $this->ordena = 'titulo';
        }
    }

    public function arquivar(Fotos $foto): void 
    {   
        if(!$foto->arquivado)
        {
            $foto->arquivado = true;
            $foto->save();  
        }
        else
        {
            $foto->arquivado = false;
            $foto->save();
        }
    }


    public function render()
    {
        $fotos = $this->montar();


        return view('livewire.imagens.ver', compact('fotos'));
    }
}
