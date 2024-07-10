<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EntradasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $QExport = DB::select("
            SELECT
                users.name,
                presencas.entrada
            FROM
                clientes
            INNER JOIN
                users ON clientes.user_id = users.id
            INNER JOIN
                presencas ON clientes.id = presencas.cliente_id
            WHERE
                users.utype = 'Cliente'
        ");

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Entrada'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
