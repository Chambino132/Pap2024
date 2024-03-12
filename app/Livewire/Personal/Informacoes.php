<?php

namespace App\Livewire\Personal;

use Livewire\Component;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;

class Informacoes extends Component
{
    public Personal $personal;

    public string $telefone;
    public string $morada;

    public bool $alt = false;

    protected $rules = [
        'telefone' => 'required|min:9',
        'morada'   => 'required|string|max:255',
    ];

    protected $messages = [
        'telefone.required' => 'O telefone é obrigratorio',
        'Morada.required'   => 'A Morada é obrigratoria',
        'telefone.min'      => 'O telefone tem de ter no minimo 9 digitos',
        'morada.string'     => 'A Morada tem de ser um conjunto de caracteres',
        'morada.max'        => 'A Morada tem de ter no maximo 255 caracteres',
    ];

    public function mount(): void
    {
        $this->personal = Personal::where('user_id', Auth::user()->id)->get()->first();
    }

    public function alterar() : void
    {   
        $this->telefone = $this->personal->telefone;
        $this->morada = $this->personal->morada;
        $this->alt = true;
    }

    public function update(): void 
    {
        $this->personal->update($this->validate());
        $this->cancelar();
    }

    public function cancelar(): void 
    {
        $this->reset(['telefone', 'morada', 'alt']);
        
    }

    public function render()
    {
        return view('livewire.personal.informacoes');
    }
}
