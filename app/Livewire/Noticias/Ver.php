<?php

namespace App\Livewire\Noticias;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class Ver extends Component
{
    use WithFileUploads , WithPagination;

    public bool $isEditing = false;
    public Noticia $noticia;

    public $foto;
    public string $titulo;
    public string $descricao;

    public int $perPage = 10;
    public string $search = '';
    public string $ordena = '';
    public string $arquivado = 'todos';

    public string $class = 'overflow-y-auto';

    protected $rules = [
        'foto' => 'required|image',
        'titulo' => 'required|string',
        'descricao' => 'required|string|max:255',
    ];

    protected $messages = [
        'foto.required' => 'A foto é obrigatoria',
        'foto.image' => 'A foto tem de ser um ficheiro Imagem',
        'titulo.required' => 'O titulo é obrigatorio',
        'titulo.string' => 'O titulo tem de ser um conjunto de caracteres',
        'descricao.required' => 'A descrição é obrigatoria',
        'descricao.string' =>  'A descrição tem de ser um conjunto de caracteres',
        'descricao.max' => 'A descrição não pode ter mais de 255 caracteres',
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

    public function editar(Noticia $noticia): void
    {
        $this->noticia = $noticia;
        $this->titulo = $noticia->titulo;
        $this->descricao = $noticia->descricao;
        $this->isEditing = true;
    }

    #[On('pagination::updated')]
    public function updatingSearch(): Void
    {
        $this->resetPage('noticiasPage');
    }

    public function cancelar() : void 
    {
        $this->reset();    
    }

    public function  rmvimg() : void 
    {
        $this->reset(['foto']);    
    }

    public function guardar(): Redirector 
    {
        if($this->foto)
        {
            $this->validate();

            Storage::disk('public')->delete($this->noticia->imagem);

            $name = $this->foto->getClientOriginalName();
                
            $imagem = $this->foto->storeAs('images', $name, 'public'); 

            $this->noticia->update([
                'imagem' => $imagem,
                'titulo' => $this->titulo,
                'descricao' => $this->descricao, 
            ]);
        }
        else
        {
            $this->validateOnly('titulo');
            $this->validateOnly('descricao');


            $this->noticia->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao, 
            ]);
        }

        return redirect(route('customize'));
    }


    public function ordenar(string $ordena) : void 
    {
            if($this->ordena == $ordena)
            {
                $this->ordena = '';
            }
            else
            {
                $this->ordena = $ordena;
            }
    }

    public function montar() 
    {
        if($this->ordena == 'titulo')
        {
            switch($this->arquivado)
            {
                case 'todos':
                    $opinioes = Noticia::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->orWhere('descricao','like', '%' .$this->search. '%')
                    ->orderby('titulo')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
                case 'arquivados':
                    $opinioes = Noticia::query()
                    ->where(function($query){
                        $query->where('titulo', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', false)
                    ->orderby('titulo')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
                case 'nao arquivados':
                    $opinioes = Noticia::query()
                    ->where(function($query){
                        $query->where('titulo', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', true)
                    ->orderby('titulo')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
            }
 
        }
        else if($this->ordena == 'descricao')
        {
            switch($this->arquivado)
            {
                case 'todos':
                    $opinioes = Noticia::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->orWhere('descricao','like', '%' .$this->search. '%')
                    ->orderby('descricao')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
                case 'arquivados':
                    $opinioes = Noticia::query()
                    ->where(function($query){
                        $query->where('titulo', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', false)
                    ->orderby('descricao')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
                case 'nao arquivados':
                    $opinioes = Noticia::query()
                    ->where(function($query){
                        $query->where('titulo', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', true)
                    ->orderby('descricao')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
            }
            
        }
        else
        {
            switch($this->arquivado)
            {
                case 'todos':
                    $opinioes = Noticia::query()
                    ->where('titulo', 'like', '%' .$this->search. '%')
                    ->orWhere('descricao','like', '%' .$this->search. '%')
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
                case 'arquivados':
                    $opinioes = Noticia::query()
                    ->where(function($query){
                        $query->where('titulo', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', false)
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
                case 'nao arquivados':
                    $opinioes = Noticia::query()
                    ->where(function($query){
                        $query->Where('descricao','like', '%' .$this->search. '%')
                        ->orwhere('titulo', 'like', '%' .$this->search. '%');  
                    })
                    ->where('arquivado', true)
                    ->paginate($this->perPage, ['*'], 'noticiasPage');
                    break;
            }
        }

        return $opinioes;
    }

    public function arquivar(Noticia $noticia): void
    {
        if(!$noticia->arquivado)
        {
            $noticia->arquivado = true;
            $noticia->save();
        }
        else
        {
            $noticia->arquivado = false;
            $noticia->save();
        }
        
    }

    public function render()
    {   
        $noticias = $this->montar();

        return view('livewire.noticias.ver', compact('noticias'));
    }
}
