<?php

namespace App\Livewire\Graficos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Utilizadores extends Component
{
    public function render()
    {
        $graf = array();

        $query = DB::select('
            SELECT
                utype as cargo,
                COUNT(*) as value
            FROM
                users
            WHERE
                utype != "Admin"
            GROUP BY
                utype;
        ');

        foreach($query as $item)
        {
            $array = array();
            if($item->cargo == "Personal")
            {
                $array['cargo'] = "Tecnico";
                $array['value'] = $item->value; 
            }
            else
            {
                $array['cargo'] = $item->cargo;
                $array['value'] = $item->value;
            }

            array_push($graf, $array);
        }

        $graf = json_encode($graf);

        return view('livewire.graficos.utilizadores', compact('graf'));
    }
}
