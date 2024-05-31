<?php

namespace App\Livewire\Graficos;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Entradas extends Component
{
    public function render()
    {
        $hoje = Carbon::now()->format('Y-m-d');

        $query = DB::select('
            SELECT
                entrada as date,
                HOUR(entrada) as hora,
                COUNT(entrada) as value
            FROM
                presencas
            WHERE
                entrada like "'.$hoje.'%"
            GROUP BY
                HOUR(entrada)
        ');

        // dd($query);

        $Graf = json_encode($query);
        return view('livewire.graficos.entradas', compact('Graf'));
    }
}
