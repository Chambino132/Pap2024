<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $QExport = DB::select("
            SELECT
                users.name,
                users.email,
                mensalidades.dias,
                clientes.dtNascimento,
                clientes.NIF,
                clientes.telefone,
                clientes.morada,
                clientes.ultMes
            FROM
                clientes
            INNER JOIN
                users ON clientes.user_id = users.id
            INNER JOIN
                mensalidades on clientes.mensalidade_id = mensalidades.id
            WHERE
                users.utype = 'Cliente'
        ");

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Email',
            'Dias de Mensalidade',
            'Data de Nascimento',
            'NIF',
            'Telefone',
            'Morada',
            'Ultimo mês pago'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
