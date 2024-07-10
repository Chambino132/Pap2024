<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FuncionariosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
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
                funcionarios.telefone,
                funcionarios.morada,
                funcionarios.cargo
            FROM
                users
            INNER JOIN
                funcionarios ON users.id = funcionarios.user_id
            WHERE
                users.utype = 'Funcionario'
        ");

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Email',
            'Telefone',
            'Morada',
            'Cargo',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
