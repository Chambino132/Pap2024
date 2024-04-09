<?php

namespace App\Livewire\Pagamentos;

use App\Models\Cliente;
use App\Models\Pagamento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public string $mes;
    public Collection $porConfirmar;

    public string $searchPagos = '';
    public string $searchPorPagar = '';
    public string $searchAtrasados = '';


    public function registar(Cliente $cliente): void
    {
        $id = $cliente->id;

        $pagamento = new Pagamento();
        $pagamento->mes_pago = $this->mes;
        $pagamento->data_pag = Carbon::now()->format('Y-m-d');
        $pagamento->cliente_id = $id;
        $pagamento->save();

        $cliente->ultMes = Carbon::now()->format('Y-m-d');
        $cliente->save();
    }

    public function mount()
    {
        $mes = Carbon::now();
        $this->porConfirmar = User::Where('utype', 'PorConfirmar')->get();

        switch ($mes->month) 
        {
            case 1:
                $this->mes = "Janeiro";
                break;
            case 2:
                $this->mes = "Fevereiro";
                break;
            case 3:
                $this->mes = "Março";
                break;
            case 4:
                $this->mes = "Abril";
                break;
            case 5:
                $this->mes = "Maio";
                break;
            case 6:
                $this->mes = "Junho";
                break;
            case 7:
                $this->mes = "Julho";
                break;
            case 8:
                $this->mes = "Agosto";
                break;
            case 9:
                $this->mes = "Setembro";
                break;
            case 10:
                $this->mes = "Outubro";
                break;
            case 11:
                $this->mes = "Novembro";
                break;
            case 12:
                $this->mes = "Dezembro";
                break;
        }
    }

    public function render()
    {
        $data = Carbon::now();
        $mesPassado = $data->month - 1;


        $clientesPagos = Cliente::query()
        ->where('ultMes', '>=',$data->year.'-'.$data->month.'-1')
        ->where('ultMes', '<=',$data->year.'-'.$data->month.'-31')
        ->join('users', 'clientes.user_id', 'users.id')
        ->where('users.name', 'like', '%'. $this->searchPagos .'%')
        ->get();
       
        $clientesPorPagar = Cliente::query()
        ->where('ultMes', '>=',$data->year.'-'.$mesPassado.'-1')
        ->where('ultMes', '<=',$data->year.'-'.$mesPassado.'-31')
        ->join('users', 'clientes.user_id', 'users.id')
        ->where('users.name', 'like', '%'. $this->searchPorPagar .'%')
        ->get();

        $clientesAtrasados = Cliente::query()
        ->where('ultMes', '<',$data->year.'-'.$mesPassado.'-1')
        ->join('users', 'clientes.user_id', 'users.id')
        ->where('users.name', 'like', '%'. $this->searchAtrasados .'%')
        ->get();

        return view('livewire.pagamentos.index', compact('clientesPagos', 'clientesPorPagar', 'clientesAtrasados'));
    }
}
