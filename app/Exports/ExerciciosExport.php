<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExerciciosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $QExport = DB::select('
            SELECT
                exercicios.nome AS exercicio_nome,
                exercicios.descricao,
                categorias.nome AS categoria_nome
            FROM
                exercicios
            INNER JOIN
                categorias ON exercicios.categoria_id = categorias.id
        ');

        return collect($QExport);
    }

    public function headings(): array
    {
        return [
            'Exercicio',
            'Descrição',
            'Categoria'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
