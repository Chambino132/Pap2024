<?php

namespace App\Livewire\Modals;

use App\Imports\TecnicosImport;
use Illuminate\Http\Request;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;

class ImportTecnicos extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.import-tecnicos');
    }

    public function importar(Request $request)
    {
        dd($request);

        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        Excel::import(new TecnicosImport(), $request->file('file'));
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
