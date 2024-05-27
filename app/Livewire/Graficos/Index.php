<?php

namespace App\Livewire\Graficos;

use Carbon\Carbon;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Presenca;
use Illuminate\Support\Arr;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;

class Index extends Component
{
    public string $mes;
    public string $ano;
    public string $mesEsc;
    public $anos;

    public function mount()
    {
        $this->mes = Carbon::now()->format('m');
        $this->ano = Carbon::now()->format('Y');
        
        switch($this->mes)
        {
            case "01":
                $this->mesEsc = "Janeiro";
                break;
            case "02":
                $this->mesEsc = "Fevereiro";
                break;
            case "03":
                $this->mesEsc = "Março";
                break;
            case "04":
                $this->mesEsc = "Abril";
                break;
            case "05":
                $this->mesEsc = "Maio";
                break;
            case "06":
                $this->mesEsc = "Junho";
                break;
            case "07":
                $this->mesEsc = "Julho";
                break;
            case "08":
                $this->mesEsc = "Agosto";
                break;
            case "09":
                $this->mesEsc = "Setembro";
                break;
            case "10":
                $this->mesEsc = "Outobro";
                break;
            case "11":
                $this->mesEsc = "Novembro";
                break;
            case "12":
                $this->mesEsc = "Dezembro";
                break;
        }

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

    #[On("dataUpdate")]
    public function getData()
    {
        $data = array();
        $temp = array();
        $graftData = array();
        $lastWeek = '';

        

        $entradas = DB::select('
            SELECT
                WEEK(entrada) as semana,
                DAYOFWEEK(entrada) as dia,
                DATE(entrada) as data,
                COUNT(entrada) as count
            FROM
                presencas        
            WHERE
                entrada LIKE "'. $this->ano. '-'. $this->mes.'%"
            GROUP BY    
                DAYOFWEEK(entrada),
                WEEK(entrada)
            ORDER BY
                WEEK(entrada) ASC
        ');

        // dd($entradas);
        $first = true;
        foreach($entradas as $entrada)
        {
            if($first)
            {
                $semana = $entrada->semana - 1;
                $first = false;
            }

            $array = [
                'semana' => "Semana ".($entrada->semana - $semana),
                'entrada'. $entrada->dia => $entrada->data,
                $entrada->dia => $entrada->count
            ];

            array_push($data, $array);
            
        }
        $count = 0;
        $cont = 0;
        foreach($data as $value)
        {
            if($value['semana'] == $lastWeek)
            {
                foreach($value as $key => $val)
                {
                    if($key != "semana")
                    {
                        
                            $temp[$key] = $val;
                        
                        $cont++;
                        // dd($data);
                    }
                }
            }
            else
            {
                $cont = 0;
                if($count != 0)
                {
                    array_push($graftData, $temp);
                }       
                $count++;
                $lastWeek = $value['semana'];
                $temp = array();
                foreach($value as $key => $val)
                {
                    
                    $temp[$key] = $val; 
                }
            }
            
        }
        array_push($graftData, $temp);

        return json_encode($graftData);
        // print_r($this->EntradasData);
        // die;
    }


    public function render()
    {
        $EntradasData = $this->getData();

        return view('livewire.graficos.index', compact('EntradasData'));
    }

}
