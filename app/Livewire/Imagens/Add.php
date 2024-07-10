<?php

namespace App\Livewire\Imagens;

use App\Models\Fotos;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $foto;
    public string $titulo;

    protected $rules = [
        'foto' => 'required|image',
        'titulo' => 'required|string|unique:App\Models\Fotos,titulo',
    ];

    protected $message = [
        'foto.required' => 'A imagem é obrigatoria',
        'foto.imagem' => 'A imagem tem de ser um ficheiro imagem',
        'titulo.required' => 'O titulo da imagem é obrigatorio',
        'titulo.string' => 'O titulo da imagem tem que ser um conjunto de caracteres',
        'titulo.unique' => 'O titulo da imagem não pode ser igual a outro titulo',
    ];

    public function  rmvimg() : void 
    {
        $this->reset(['foto']);    
    }

    public function guardar()
    {
        $this->validate();

        $name = $this->foto->getClientOriginalName();
			
        $imagem = $this->foto->storeAs('images', $name, 'public');

        Fotos::create([
            'imagem' => $imagem,
            'titulo' => $this->titulo,
        ]);

        $this->reset();
        session()->flash('sucesso', 'A Imagem foi adicionada com sucesso!');
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        if(Session('sucess'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
        return view('livewire.imagens.add');
    }
}
