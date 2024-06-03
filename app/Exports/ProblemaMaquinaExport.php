<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProblemaMaquinaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $QExport = DB::select("
            SELECT    
                problemas.problema,
                problemas.estado
            FROM
                problemas
            WHERE
                equipamento_id = ".$this->id." 
        ");

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Problema',
            'Estado'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
