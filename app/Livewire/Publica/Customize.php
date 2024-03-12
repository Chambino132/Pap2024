<?php

namespace App\Livewire\Publica;

use App\Models\Fotos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Customize extends Component
{
    use WithFileUploads;

    public Collection $fotos;
    public Fotos $hero1;
    public Fotos $hero2;
    public Fotos $hero3;
    public Fotos $videoImg;

    public bool $alt1 = false;
    public bool $alt2 = false;
    public bool $alt3 = false;
    public bool $alt4 = false;
    
    public $foto;
    public $foto1;
    public $foto2;
    public $foto3;
    public $foto4;
    public ?string $titulo;

    protected $rules = [
        'foto' => 'required|image',
        'titulo' => 'required|string|max:255',
    ];

    public function alterar1(): void
    {
        $this->alt1 = true;
    }
    
    public function alterar2(): void
    {
        $this->alt2 = true;
    }
    
    public function alterar3(): void
    {
        $this->alt3 = true;
    }

    public function alterar4(): void
    {
        $this->alt4 = true;
    }

    public function cancelar(): void
    {
        $this->reset(['alt1','alt2','alt3','alt4', 'foto']);
    }

    public function alterar($imagem):void
    {
        $this->validateOnly('foto');

        if($imagem == 'hero1')
        {
            Storage::disk('public')->delete($this->hero1->imagem);

            $name = $this->foto->getClientOriginalName();
			
            $imagem = $this->foto->storeAs('images', $name, 'public');

            $this->hero1->imagem = $imagem;
            $this->hero1->update();
        }

        if($imagem == 'hero2')
        {
            Storage::disk('public')->delete($this->hero2->imagem);

            $name = $this->foto->getClientOriginalName();
			
            $imagem = $this->foto->storeAs('images', $name, 'public');

            $this->hero2->imagem = $imagem;
            $this->hero2->update();
        }

        if($imagem == 'hero3')
        {
            Storage::disk('public')->delete($this->hero3->imagem);

            $name = $this->foto->getClientOriginalName();
			
            $imagem = $this->foto->storeAs('images', $name, 'public');

            $this->hero3->imagem = $imagem;
            $this->hero3->update();
        }

        if($imagem == 'videoImg')
        {
            Storage::disk('public')->delete($this->videoImg->imagem);

            $name = $this->foto->getClientOriginalName();
			
            $imagem = $this->foto->storeAs('images', $name, 'public');

            $this->videoImg->imagem = $imagem;
            $this->videoImg->update();
        }

        $this->cancelar();
        $this->montar();
    }

    public function guardar($titulo = null) : void 
    {
        if($titulo)
        {
            $this->titulo = $titulo;

            switch ($titulo)
            {
                case 'hero1':
                    $this->foto = $this->foto1;
                    break;
                case 'hero2':
                    $this->foto = $this->foto2;
                    break;
                case 'hero3':
                    $this->foto = $this->foto3;
                    break;
                case 'videoImg':
                    $this->foto = $this->foto4;
                    break;    
            }


            if($titulo == 'hero1')
            {
                $this->foto = $this->foto1;
            }
        }

        $this->validate();
        
        $name = $this->foto->getClientOriginalName();
			
			
        $imagem = $this->foto->storeAs('images', $name, 'public');

        Fotos::create([
            'imagem' => $imagem,
            'titulo' => $this->titulo,
        ]);

        $this->montar();
    }

    public function rmvimg(): void 
    {
        $this->reset(['foto1', 'foto2', 'foto3', 'foto4']);    
    }

    public function montar() : void 
    {
        $this->fotos = Fotos::all();

        foreach($this->fotos as $foto)
        {
            if($foto->titulo == "hero1")
            {
                $this->hero1 = $foto;
            }

            if($foto->titulo == "hero2")
            {
                $this->hero2 = $foto;
            }

            if($foto->titulo == "hero3")
            {
                $this->hero3 = $foto;
            }
            
            if($foto->titulo == "videoImg")
            {
                $this->videoImg = $foto;
            }


        }
    }

    public function mount(): void
    {
        $this->montar();
    }

    public function render()
    {
        return view('livewire.publica.customize')->layout('layouts.app');
    }
}
