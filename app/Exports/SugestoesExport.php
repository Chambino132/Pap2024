<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PHPUnit\TestRunner\TestResult\Collector;

class SugestoesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $QExport = DB::select("
            SELECT
                users.name,
                reclamacaos.descricao,
                reclamacaos.arquivado
            FROM
                users
            INNER JOIN
                reclamacaos ON users.id = reclamacaos.user_id
        ");

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Descrição',
            'Arquivado'
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
