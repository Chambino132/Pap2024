<?php

namespace App\Livewire\Mensalidade;

use Livewire\Component;
use App\Models\Mensalidade;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Ver extends Component
{
    public Collection $mensalidades;
    public Mensalidade $mensalidade;

    public bool $isEditing = false;
    public bool $isCreating = false;

    public ?string $dias;
    public ?string $preco;
    
    protected $rules = [
        'dias' => 'required|numeric|max:6',
        'preco' => 'required|numeric',
    ];

    public function alterar(): void 
    {
        $this->mensalidade->update($this->validate());
        $this->reset();
        $this->mensalidades = Mensalidade::all();
        $this->dispatch('notify', 'A Mensalidade foi alterada com sucesso');
    }

    public function edit(Mensalidade $mensalidade): void 
    {
        $this->mensalidade = $mensalidade;
        $this->dias = $mensalidade->dias;
        $this->preco = $mensalidade->preco;
        $this->isEditing = true;
    }

    public function novo(): void
    {
        $this->isCreating = true;
    }

    public function guardar():void
    {
        Mensalidade::create($this->validate());
        $this->reset(['isCreating']);
        $this->mensalidades = Mensalidade::all();
        $this->dispatch('notify', 'A Mensalidade foi alterada com sucesso');
    }

    #[On('mensalidade::delete')]
    public function deletado()
    {
        return redirect(request()->header('Referer'));   
    }
    
    public function cancelar()
    {
        $this->reset(['isEditing', 'isCreating']);
    }

    public function mount()
    {
        $this->mensalidades = Mensalidade::all();
    }

    public function render()
    {
        return view('livewire.mensalidade.ver');
        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }
    }
}