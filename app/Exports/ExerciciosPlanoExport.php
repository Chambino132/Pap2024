<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExerciciosPlanoExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
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
                exercicios.nome AS exercicio_nome,
                exercicios.descricao,
                categorias.nome AS categoria_nome,
                exercicio_plano.repeticoes
            FROM
                exercicio_plano
            INNER JOIN
                exercicios ON exercicio_plano.exercicio_id = exercicios.id
            INNER JOIN
                categorias ON exercicios.categoria_id = categorias.id
            INNER JOIN
                planos ON exercicio_plano.plano_id = planos.id
            WHERE
                planos.id = ".$this->id."
        ");

        return collect($QExport);
    }


    public function headings(): array
    {
        return [
            'Exercicio',
            'Descrição',
            'Categoria',
            'Repetições'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
