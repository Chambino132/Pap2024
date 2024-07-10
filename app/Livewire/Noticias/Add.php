<?php

namespace App\Livewire\Noticias;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $foto;
    public string $titulo;
    public string $descricao;

    protected $rules = [
        'foto' => 'required|image',
        'titulo' => 'required|string',
        'descricao' => 'required|string|max:255',
    ];

    public function guardar()
    {
        $this->validate();

        $name = $this->foto->getClientOriginalName();
			
        $imagem = $this->foto->storeAs('images', $name, 'public');

        Noticia::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'imagem' => $imagem,
        ]);

        session()->flash('sucesso', 'A Imagem foi adicionada com sucesso!');
        return redirect(request()->header('Referer'));
    }

    public function  rmvimg() : void 
    {
        $this->reset(['foto']);    
    }


    public function render()
    {
        return view('livewire.noticias.add');
    }
}
