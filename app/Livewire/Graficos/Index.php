<?php

namespace App\Livewire\Graficos;

use App\Models\Presenca;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $entradas;
    public $semanas = array();
    public $dias = array();
    public $info = array();

    public function mount()
    {
        $this->entradas = DB::select('
            SELECT 
                WEEK(presencas.entrada) AS week,
                DAYOFWEEK(presencas.entrada) AS day
            FROM
                presencas
            GROUP BY
                week, day
        ');

        foreach ($this->entradas as $key => $value) {
            array_push($this->semanas, $value->week);
        }
        $this->semanas = array_unique($this->semanas);


        foreach($this->semanas as $key => $value)
        {
            $this->info[$key]['week'] = $value;
            $this->info[$key]['domingo'] = 0;
            $this->info[$key]['segunda-feira'] = 0;
            $this->info[$key]['terca-feira'] = 0;
            $this->info[$key]['quarta-feira'] = 0;
            $this->info[$key]['quinta-feira'] = 0;
            $this->info[$key]['sexta-feira'] = 0;
            $this->info[$key]['sabado'] = 0;
        }
        dd($this->info);
        foreach($this->anos as $key => $value)
        {
            foreach($this->entradas as $key1 => $value1)
            {
                $this->info[$key]['year'] = $value;
                if ($value1->day == '1')
                {
                    $this->info[$key]['domingo']++; 
                } elseif($value1->day == '2') {
                    $this->info[$key]['segunda-feira']++;
                } elseif($value1->day == '3') {
                    $this->info[$key]['terca-feira']++;
                } elseif($value1->day == '4') {
                    $this->info[$key]['quarta-feira']++;
                } elseif($value1->day == '5') {
                    $this->info[$key]['quinta-feira']++;
                } elseif($value1->day == '6') {
                    $this->info[$key]['sexta-feira']++;
                } elseif($value1->day == '7') {
                    $this->info[$key]['sabado']++;
                }
            }
        }
        dd($this->info);
    }

    public function render()
    {
        return view('livewire.graficos.index');
    }

    public function teste()
    {
        
    }
}
