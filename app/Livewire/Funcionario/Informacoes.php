<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class Informacoes extends Component
{
    use WithFileUploads;

    public Funcionario $funcionario;

    public ?string $telefone;
    public ?string $morada;
    public $imagem;

    public bool $alt = false;

    protected $rules = [
        'telefone' => 'required|int',
        'morada' => 'required|string|max:255',
        'imagem' => 'sometimes|image'
    ];

    public function rules() : array 
    {
        if($this->imagem)
        {
            return [
                'telefone' => 'required|int',
                'morada' => 'required|string|max:255',  
                'imagem' => 'sometimes|image'
            ];
        }
        else
        {
            return [
                'telefone' => 'required|int',
                'morada' => 'required|string|max:255',
            ];
        }    
    }

    public function alterar()
    {
        $this->telefone = $this->funcionario->telefone;
        $this->morada = $this->funcionario->morada;
        $this->alt = true;
    }

    public function guardar()
    {
        $this->validate();

        if($this->imagem)
        {
            $nome = $this->imagem->getClientOriginalName();

            $foto = $this->imagem->storeAs('images', $nome, 'public');

            Storage::disk('public')->delete($this->funcionario);

            $this->funcionario->update([
                'telefone' => $this->telefone,
                'morada' => $this->morada,
                'foto' => $foto,
            ]);
        }
        else
        {
            $this->funcionario->update([
                'telefone' => $this->telefone,
                'morada' => $this->morada,
            ]);
        }
        $this->cancelar();
    }

    public function rmvimg()
    {
        $this->reset(['imagem']);
    }

    public function cancelar()
    {
        $this->reset(['telefone', 'morada', 'imagem', 'alt']);

    }

    public function mount()
    {
        $this->funcionario = Funcionario::where('user_id', Auth::user()->id)->get()->first();
    }

    public function render()
    {
        return view('livewire.funcionario.informacoes');
    }
}
