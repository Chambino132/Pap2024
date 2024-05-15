<?php

namespace App\Livewire\Graficos;

use App\Models\Presenca;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public string $mes;
    public string $ano;
    public $anos;

    public function mount()
    {
        $this->mes = Carbon::now()->format('m');
        $this->ano = Carbon::now()->format('Y');

        $this->anos = DB::select('
            SELECT
                YEAR(entrada) AS ano
            FROM
                presencas
            GROUP BY
                YEAR(entrada)
            ORDER BY
                YEAR(entrada)
        ');

    }

    public function render()
    {
        $data = array();

        $entradas = DB::select('
            SELECT
                WEEK(entrada) as semana,
                DAYOFWEEK(entrada) as dia,
                COUNT(entrada) as count
            FROM
                presencas        
            WHERE
                entrada LIKE "'. $this->ano. '-'. $this->mes.'%"
            GROUP BY    
                WEEK(entrada),
                DAYOFWEEK(entrada)
            ORDER BY
                WEEK(entrada) ASC
        ');

        dd($entradas);
        foreach($entradas as $entrada)
        {
            
            
            
        }

        $data = json_encode($data);

        echo "<pre>";
        print_r($data);

        return view('livewire.graficos.index');
    }

}
