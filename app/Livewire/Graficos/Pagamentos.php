<?php

namespace App\Livewire\Graficos;

use Carbon\Carbon;
use App\Models\Cliente;
use Illuminate\Support\Arr;
use Livewire\Component;

class Pagamentos extends Component
{
    public string $mesEsc;

    public function render()
    {
        $data = Carbon::now();
        $mesPassado = $data->month - 1;
        $PagData = array();

        $pagos = Cliente::where('ultMes', '>=',$data->year.'-'.$data->month.'-1')
                ->where('ultMes', '<=',$data->year.'-'.$data->month.'-31')
                ->count();
        $porPagar = Cliente::where('ultMes', '>=',$data->year.'-'.$mesPassado.'-1')
                ->where('ultMes', '<=',$data->year.'-'.$mesPassado.'-31')
                ->count();
        $atrasados = Cliente::where('ultMes', '<',$data->year.'-'.$mesPassado.'-1')
                ->count();
        
        for ($i=0; $i < 3; $i++) 
        { 
           switch($i)
           {
                case 0:
                        $array = [
                            'category' => "Pagos",
                            'value' => $pagos,
                        ];
                    break;
                case 1:
                        $array = [
                            'category' => "Por Pagar",
                            'value' =>  $porPagar,
                        ];
                    break;
                case 2:
                        $array = [
                            'category' => "Atrasados",
                            'value' =>  $atrasados,
                        ];
                    break;
           } 

           array_push($PagData, $array);
        }

        switch($data->month)
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


        $PagData = json_encode($PagData);

        return view('livewire.graficos.pagamentos', compact('PagData'));
    }
}
