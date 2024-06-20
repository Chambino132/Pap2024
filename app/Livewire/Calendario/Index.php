<?php

namespace App\Livewire\Calendario;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public function newEvent($name, $startDate, $endDate)
    {
        // dd($startDate, $endDate);
        if (Auth::user()->utype != 'Cliente' && Auth::user()->utype != 'Personal')    
        {
            $validated = Validator::make(
                [
                    'name' => $name,
                    'start_time' => $startDate,
                    'end_time' => $endDate,
                ],
                [
                    'name' => 'required|min:1|max:40',
                    'start_time' => 'required',
                    'end_time' => 'required',
                ]
            )->validate();

            $this->dispatch('notify', 'Evento foi criado com sucesso!');

            $event = Event::create(
                $validated
            );

            return $event->id;
        }
        else
        {
            $this->dispatch('notify', 'Você não tem permissão para criar eventos!');
            return redirect(request()->header('Referer'));
        }
    }

    public function updateEvent($id, $name, $startDate, $endDate)
    {
        if (Auth::user()->utype != 'Cliente' && Auth::user()->utype != 'Personal')
        {
            $validated = Validator::make(
                [
                    'start_time' => $startDate,
                    'end_time' => $endDate,
                ],
                [
                    'start_time' => 'required',
                    'end_time' => 'required',
                ]
            )->validate();

            Event::findOrFail($id)->update($validated);

            $this->dispatch('notify', 'Evento movido e atualizado com sucesso!');
        }
        else
        {
            $this->dispatch('notify', 'Você não tem permissão para alterar eventos!');
            return redirect(request()->header('Referer'));
        }
    }

    public function deleteEvent($id)
    {
        if (Auth::user()->utype != 'Cliente' && Auth::user()->utype != 'Personal') 
        {
            $this->dispatch('openModal', 'modals.confirmacao-delete-evento', ['eventID' => $id]);
        }
        else
        {
            $this->dispatch('notify', 'Você não tem permissão para excluir eventos!');
        }
    }

    #[On('evento::delete')]
    public function EventoDelete()
    {
        session()->flash('sucessoE', 'O Evento foi Deletado com sucesso!');
        dd(session('sucessoE'));
        return redirect(request()->header('Referer'));
    }

    public function render() 
    {
        if (Auth::user()->utype == 'Cliente')
        {
            $marcacoes = DB::select('
                SELECT
                    CONCAT(dia, " ", hora) as data
                FROM
                    marcacaos
                WHERE
                    cliente_id = '. Auth::user()->id .'
                    AND estado = "aceite";
            ');
        }
        // else if (Auth::user()->utype == 'Personal')
        // {
        //     $marcacoes = DB::select('
        //         SELECT
        //             dia,
        //             hora,
        //             cliente_id,
        //             personal_id,
        //         FROM
        //             marcacoes
        //         WHERE

        //     ');
        // }

        // dd($marcacoes);

        $events = [];

        foreach (Event::all() as $event) {
            $events[] =  [
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->start_time,
                'end' => $event->end_time,
            ];
        }
        foreach($marcacoes as $marcacao)
        {
            $events[] = [
                'title' => "POG",
                'start' => $marcacao->data,
            ];
        }

        if(session('sucessoE'))
        {
            dd(session('sucessoE'));
            $this->dispatch('notify', Session::get('sucessoE'));
        }

        return view('livewire.calendario.index', [
            'events'=>$events
        ])->layout('layouts.app');
    }
}