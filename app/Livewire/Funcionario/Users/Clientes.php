<?php

namespace App\Livewire\Funcionario\Users;


use App\Exports\ClientesExport;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Presenca;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;


class Clientes extends Component
{
    use WithPagination;

    public ?string $entrada;
    public ?int $cliente_id;

    public int $perPage = 10;
    public string $search = '';
    public bool $ordena = false;

    public string $class = 'overflow-y-auto';

    protected $rules = [
        'cliente_id' => 'required',
        'entrada' => 'required',
    ];

    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('clientePage');
    }

    function ordenar() : void 
    {
        if($this->ordena)
        {
            $this->ordena = false;
        }
        else
        {
            $this->ordena = true;
        }    
    }

    #[On('change::class')]
    public function changeClassAuto(): void
    {
        $this->class = 'overflow-y-auto';
    }
    
    public function changeClass(): void
    {
        $this->class = 'overflow-visible';
    }

    public function montar() 
    {   
        if($this->ordena)
        {
            $usersC = User::query()
            ->where('utype',"Cliente")
            ->where('name', 'like', '%' .$this->search. '%')
            ->orderBy('name')
            ->paginate($this->perPage, ['*'], 'clientesPage');
        }
        else
        {
            $usersC = User::query()
            ->where('utype',"Cliente")
            ->where('name', 'like', '%' .$this->search. '%')
            ->paginate($this->perPage, ['*'], 'clientePage');
        }

        return $usersC;
    }

    public function exportar()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }

    public function exportarPDF()
    {
        return Excel::download(new ClientesExport, 'clientes.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
   
    public function render()
    {
        $usersC = $this->montar();
        
        if(Route::current()->hasParameter('cliente'))
        {
            $id = Cliente::select('id')
                        ->where('hash', Route::current()->parameter('cliente'))->get()->first();
            $this->saveEntrada($id->id);
        }
        
        return view('livewire.funcionario.users.clientes', compact('usersC'));
    }
    
    public function confirmEntrada($id)
    {
        $cliente = Cliente::findOrFail($id);
 
        $dataPago = Carbon::parse($cliente->ultMes);
        $dias = $cliente->mensalidade->dias[0];

        $entradas = Presenca::whereBetween('entrada', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        if($entradas >= $dias)
        {
            $this->dispatch('notify', 'O cliente já foi '. $dias.' vez(es) esta semana');
        }
        else
        { 
            if($dataPago->isSameAs('Y-m', Carbon::now()))
            {
                $this->saveEntrada($id);
            }
            else
            {
                $this->dispatch('openModal', 'modals.pag-atr', ['id' => $cliente->id, 'texto' => 'ainda não pagou este mês']);
            }
        }
    }

    #[On('MarcarEntrada')]
    public function saveEntrada(int $id)
    {
        $this->cliente_id = $id;
        $this->entrada = Carbon::now();

        Presenca::create($this->validate());
        session()->flash('sucesso', 'A Entrada foi registada com sucesso');
        return redirect(route('entradas'));
    }

    
}
