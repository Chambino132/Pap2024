<?php

namespace App\Livewire\Atividades;

use App\Models\Atividade;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;


    public string $search = '';
    public int $perPage = 10;
    public bool $ordena = false;

    public string $atividade;

    protected $rules = [
        'atividade' => 'required|string|max:255',
    ];

    protected $messages = [
        'atividade.required' => 'Preencha a Atividade',
        'atividade.string' => 'A Atividade tem de ser um conjunto de caracteres',
        'atividade.max' => 'A Atividade não pode ter mais de 255 caracteres',
    ];

    public function Criar()
    {
        Atividade::create($this->validate());
        $this->reset('atividade');

        session()->flash('sucesso', 'Atividade Criada com Succeso');
        $this->refresh();
    }


    public function ordenar()
    {
        if($this->ordena)
        {
            $this->ordena = false;
        }
        else
        {
            $this->ordena = true;
        }
    }

    #[On('closeModal')]
    public function refresh()
    {
       return $this->redirect(route('atividades'));
    }


    public function render()
    {
        
        if($this->ordena)
        {
            $atividades = Atividade::where('atividade', 'like', '%'. $this->search .'%')
                                    ->orderBy('atividade')
                                    ->paginate($this->perPage, ['*'], 'AtividadePage');
        }
        else
        {
            $atividades = Atividade::where('atividade', 'like', '%'. $this->search .'%')
                                    ->paginate($this->perPage, ['*'], 'AtividadePage');
        }

        if(session('sucesso'))
        {
            
            $this->dispatch('notify', 'Atividade Criada Com sucesso');
        }


        return view('livewire.atividades.index', compact('atividades'))->layout('layouts.app');
    }
}
