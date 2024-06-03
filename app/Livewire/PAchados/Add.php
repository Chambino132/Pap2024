<?php

namespace App\Livewire\PAchados;

use App\Models\Perdidos;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public string $item;
    public string $localizacao;
    public $foto;

    protected $rules = [
        'item' => 'required|string|max:255',
        'localizacao' => 'required|string|max:255',
        'foto' => 'required|image'
    ];

    protected $message = [
        'item.required' => 'Este campo é obrigatorio',
        'item.string' => 'Este campo tem de ser um conjunto de caracteres',
        'item.max' => 'Este campo não pode ter mais de 255 caracteres',
        'localizacao.required' => 'Este campo é obrigatorio',
        'localizacao.string' => 'Este campo tem de ser um conjunto de caracteres',
        'localizacao.max' => 'Este campo não pode ter mais de 255 caracteres',
        'foto.required' => 'Este campo é obrigatorio',
        'foto.image' => 'Este campo deve ser uma imagem'
    ];

    public function guardar()
    {
        $this->validate();

        $name = $this->foto->getClientOriginalName();
			
        $imagem = $this->foto->storeAs('images', $name, 'public');

        Perdidos::create([
            'item' => $this->item,
            'localizacao' => $this->localizacao,
            'imagem' => $imagem,
        ]);

        $this->dispatch('notify', 'Anucio criado com sucesso');
        $this->reset();
    }

    public function rmvimg()
    {
        $this->reset(['foto']);
    }

    public function render()
    {
        return view('livewire.p-achados.add');
    }
}
