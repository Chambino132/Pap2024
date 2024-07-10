<?php

namespace App\Exports;

use App\Models\Personal;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TecnicosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
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
            personals.dtNascimento,
            personals.telefone,
            personals.morada,
            atividades.atividade
        FROM
            personals
        INNER JOIN
            users ON personals.user_id = users.id
        INNER JOIN
            atividades ON personals.atividade_id = atividades.id
        WHERE
            users.utype = 'Personal'
        ");
        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Email',
            'Data de Nascimento',
            'Telefone',
            'Morada',
            'Atividade'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
