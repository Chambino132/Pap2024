<?php

namespace App\Livewire\Publica;

use App\Models\Hero;
use App\Models\Sobre;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class Edit extends Component
{
    public Collection $heros;
    public Collection $sobres;

    public bool $editHero = false;

    public string $titulo1;
    public string $subtitulo1;
    public string $titulo2;
    public string $subtitulo2;
    public string $titulo3;
    public string $subtitulo3;

    public string $tituloSo1;
    public string $text1;
    public string $tituloSo2;
    public string $text2;
    public string $tituloSo3;
    public string $text3;
    public string $tituloSo4;
    public string $text4;

    public string $titulo;
    public string $subtitulo;
    public string $texto;



    public function rules()
    {
        if($this->editHero)
        {
            return [
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            ];
        }
        else
        {
            return [
                'titulo' => 'required|string|max:255',
                'texto' => 'required|string',
            ];
        }

    }


    public function mount()
    {
       $this->heros = Hero::all();
       $this->sobres = Sobre::all();
       $count = 0;
       foreach ($this->heros as $hero) {
            if($count == 0)
            {
                $this->titulo1 = $hero->titulo;
                $this->subtitulo1 = $hero->subtitulo;
            }
            else if ($count == 1)
            {
                $this->titulo2 = $hero->titulo;
                $this->subtitulo2 = $hero->subtitulo;
            }
            else
            {
                $this->titulo3 = $hero->titulo;
                $this->subtitulo3 = $hero->subtitulo;   
            }
            $count++;
        }
        $count = 0;
        foreach($this->sobres as $sobre)
        {
            
            switch($count)
            {
                case 0:
                    $this->tituloSo1 = $sobre->titulo;
                    $this->text1 = $sobre->texto;
                    break;
                case 1:
                    $this->tituloSo2 = $sobre->titulo;
                    $this->text2 = $sobre->texto;
                    break;
                case 2:
                    $this->tituloSo3 = $sobre->titulo;
                    $this->text3 = $sobre->texto;
                    break;
                case 3:
                    $this->tituloSo4 = $sobre->titulo;
                    $this->text4 = $sobre->texto;
                    break;
            }
            $count++;
        }

    }

    public function Guardar($heroID)
    {
        $this->editHero = true;
        switch($heroID)
        {
            case 1:
                $this->titulo = $this->titulo1;
                $this->subtitulo = $this->subtitulo1;
                break;
            case 2:
                $this->titulo = $this->titulo2;
                $this->subtitulo = $this->subtitulo2;
                break;
            case 3:
                $this->titulo = $this->titulo3;
                $this->subtitulo = $this->subtitulo3;
                break;
        }

        $hero = Hero::findOrFail($heroID);

        $this->validate();

        $hero->update([
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
        ]);
        $this->editHero = false;
        $this->dispatch('notify', 'Secção Atualizada com sucesso');
    }

    public function GuardarSobre($sobreID)
    {
        $this->editHero = false;

        switch($sobreID)
        {
            case 1:
                $this->titulo = $this->tituloSo1;
                $this->texto = $this->text1;
                break;
            case 2:
                $this->titulo = $this->tituloSo2;
                $this->texto = $this->text2;
                break;
            case 3:
                $this->titulo = $this->tituloSo3;
                $this->texto = $this->text3;
                break;
            case 4:
                $this->titulo = $this->tituloSo4;
                $this->texto = $this->text4;
                break;
        }    
        
        $sobre = Sobre::findOrFail($sobreID);

        $sobre->update($this->validate());
        $this->dispatch('notify', 'Secção Atualizada com sucesso');
    }

    public function render()
    {
        return view('livewire.publica.edit');
    }
}
