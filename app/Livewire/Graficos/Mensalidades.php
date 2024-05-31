<?php

namespace App\Livewire\Graficos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Pest\Support\Arr;

class Mensalidades extends Component
{
    public function render()
    {
        $data = array();

        $query = DB::select("
            SELECT
                mensalidades.dias,
                mensalidades.preco,
                COUNT(*) as clientes
            FROM
                mensalidades
            INNER JOIN clientes ON clientes.mensalidade_id = mensalidades.id
            GROUP BY
            clientes.mensalidade_id;
        ");

        foreach($query as $value)
        {
            $array['mensalidade'] = $value->dias;
            $array['clientes'] = $value->clientes;
            $array['expectativa'] = $value->preco * $value->clientes;

            array_push($data, $array);
            $array = array();
        }

        $menData = json_encode($data);


        return view('livewire.graficos.mensalidades', compact('menData'));
    }
}
