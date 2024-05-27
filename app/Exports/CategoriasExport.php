<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoriasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $QExport = DB::select('
            SELECT
                categorias.nome,
                COUNT(exercicios.id) as total_exercicios
            FROM
                categorias
            LEFT JOIN
                exercicios ON categorias.id = exercicios.categoria_id
            GROUP BY
                categorias.id,
                categorias.nome
        ');

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Total de Exercicios'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
