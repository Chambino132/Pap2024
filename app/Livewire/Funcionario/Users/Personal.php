<?php

namespace App\Livewire\Funcionario\Users;

use App\Exports\TecnicosExport;
use App\Imports\TecnicosImport;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Personal extends Component
{

    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public bool $ordena = false;
    public $QExport;

    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('personalPage');
    }

    public function ordenar()
    {
        if(!$this->ordena)
        {
            $this->ordena = true;
        }
        else
        {
            $this->ordena = false;
        }
    }

    public function exportar()
    {
        return Excel::download(new TecnicosExport, 'tecnicos.xlsx');
    }

    public function exportarPDF()
    {
        return Excel::download(new TecnicosExport, 'tecnicos.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }

    public function render()
    {
        $personals = $this->montar();

        return view('livewire.funcionario.users.personal', compact('personals'));
    }

    #[On('personal::created')]
    public function montar() 
    {   
        if(!$this->ordena)
        {
            $personals = User::query()
            ->where('utype', 'Personal')
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate($this->perPage,['*'], 'personalPage');
        }
        else
        {
            $personals = User::query()
            ->where('utype', 'Personal')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('name')
            ->paginate($this->perPage,['*'], 'personalPage');
        }

        return $personals;
    }

}
