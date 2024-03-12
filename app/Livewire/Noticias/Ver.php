<?php

namespace App\Livewire\Noticias;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class Ver extends Component
{
    use WithFileUploads;

    public Collection $noticias;
    public bool $isEditing = false;
    public Noticia $noticia;

    public $foto;
    public string $titulo;
    public string $descricao;

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

    public function mount() : void 
    {
        $this->noticias = Noticia::all();    
    }

    public function editar(Noticia $noticia): void
    {
        $this->noticia = $noticia;
        $this->titulo = $noticia->titulo;
        $this->descricao = $noticia->descricao;
        $this->isEditing = true;
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

    public function desarquivar(Noticia $noticia): void
    {
        $noticia->arquivado = false;
        $noticia->save();
        $this->noticias = Noticia::all();
    }

    public function arquivar(Noticia $noticia): void
    {
        $noticia->arquivado = true;
        $noticia->save();
        $this->noticias = Noticia::all();
    }

    public function render()
    {
        return view('livewire.noticias.ver');
    }
}
