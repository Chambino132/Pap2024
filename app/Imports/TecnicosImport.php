<?php

namespace App\Imports;

use App\Models\Atividade;
use App\Models\Personal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TecnicosImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            User::create([
                'name' => $row['Nome'],
                'email' => $row['Email'],
                'utype' => 'Personal'
            ]);

            Personal::create([
                'dtNascimento' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['Data_de_Nascimento'])),
                'telefone' => $row['Telefone'],
                'morada' => $row['morada'],
            ]);

            Atividade::create([
                'atividade' => $row['Atividade']
            ]);
        }
    }
}
