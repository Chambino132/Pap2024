<?php

namespace App\Livewire\Atividades;

use App\Models\Atividade;
use App\Models\Personal;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AssociarModal extends ModalComponent
{
    public Atividade $atividade;
    public array $associados;


    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function associar()
    {
        $this->atividade->personals()->syncWithoutDetaching($this->associados);   
    }

    public function render()
    {
        $atividadeID = $this->atividade->id;

        $tecnicosIN = Personal::whereHas('atividades', function($query) use ($atividadeID){
            $query->where('atividade_id', $atividadeID);
        })->get();

        $tecnicosOUT = Personal::whereDoesntHave('atividades', function($query) use ($atividadeID){
            $query->where('atividade_id', $atividadeID);
        })->get();

        return view('livewire.atividades.associar-modal', compact('tecnicosIN', 'tecnicosOUT'));
    }
}
