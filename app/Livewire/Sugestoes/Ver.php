<?php

namespace App\Livewire\Sugestoes;

use App\Models\Reclamacao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use League\Flysystem\MountManager;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

use function Pest\Laravel\swap;

class Ver extends Component
{

    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public bool $ordena = false;
    public string $arquivado = 'todos';


    #[On('sugestao::delete')]
    public function refresh()
    {
        session()->flash('sucesso', 'Sugestão deletada!');
        return redirect(request()->header('Referer'));
    }

    public function arquivar(Reclamacao $opiniao) : void 
    {
        if(!$opiniao->arquivado)
        {
            $opiniao->arquivado = true;
            $opiniao->save();
        }
        else
        {
            $opiniao->arquivado = false;
            $opiniao->save();
        }
    }


    public function ordenar(): void 
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

    #[On('pagination::updated')]
    public function updatingSearch(): Void
    {
        $this->resetPage('opinoesPage');
    }

    public function montar() 
    {
        if($this->ordena)
        {
            

            switch($this->arquivado)
            {
                case 'todos':
                    $opinioes = Reclamacao::query()
                    ->join('users', 'reclamacaos.user_id', 'users.id')
                    ->where('users.name', 'like', '%' .$this->search. '%')
                    ->orWhere('descricao','like', '%' .$this->search. '%')
                    ->orderby('name')
                    ->select('reclamacaos.id as id', 'reclamacaos.descricao as descricao', 'users.name as name', 'reclamacaos.arquivado as arquivado')
                    ->paginate($this->perPage, ['*'], 'opinoesPage');
                    break;
                case 'arquivados':
                    $opinioes = Reclamacao::query()
                    ->join('users', 'reclamacaos.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', false)
                    ->orderby('name')
                    ->select('reclamacaos.id as id', 'reclamacaos.descricao as descricao', 'users.name as name', 'reclamacaos.arquivado as arquivado')
                    ->paginate($this->perPage, ['*'], 'opinoesPage');
                    break;
                case 'nao arquivados':
                    $opinioes = Reclamacao::query()
                    ->join('users', 'reclamacaos.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', true)
                    ->select('reclamacaos.id as id', 'reclamacaos.descricao as descricao', 'users.name as name', 'reclamacaos.arquivado as arquivado')
                    ->orderby('name')
                    ->paginate($this->perPage, ['*'], 'opinoesPage');
                    break;
            }
 
        }
        else
        {
            switch($this->arquivado)
            {
                case 'todos':
                    $opinioes = Reclamacao::query()
                    ->join('users', 'reclamacaos.user_id', 'users.id')
                    ->where('users.name', 'like', '%' .$this->search. '%')
                    ->orWhere('descricao','like', '%' .$this->search. '%')
                    ->select('reclamacaos.id as id', 'reclamacaos.descricao as descricao', 'users.name as name', 'reclamacaos.arquivado as arquivado')
                    ->paginate($this->perPage, ['*'], 'opinoesPage');
                    break;
                case 'arquivados':
                    $opinioes = Reclamacao::query()
                    ->join('users', 'reclamacaos.user_id', 'users.id')
                    ->where(function($query){
                        $query->where('users.name', 'like', '%' .$this->search. '%')
                        ->orWhere('descricao','like', '%' .$this->search. '%');
                    })
                    ->where('arquivado', false)
                    ->select('reclamacaos.id as id', 'reclamacaos.descricao as descricao', 'users.name as name', 'reclamacaos.arquivado as arquivado')
                    ->paginate($this->perPage, ['*'], 'opinoesPage');
                    break;
                case 'nao arquivados':
                    $opinioes = Reclamacao::query()
                    ->join('users', 'reclamacaos.user_id', 'users.id')
                    ->where(function($query){
                        $query->Where('descricao','like', '%' .$this->search. '%')
                        ->orwhere('users.name', 'like', '%' .$this->search. '%');       
                    })
                    ->where('arquivado', true)
                    ->select('reclamacaos.id as id', 'reclamacaos.descricao as descricao', 'users.name as name', 'reclamacaos.arquivado as arquivado')
                    ->paginate($this->perPage, ['*'], 'opinoesPage');
                    break;
            }
            
        }


        return $opinioes;
    }


    public function render()
    {
        if(session('sucesso'))
        {
            $this->dispatch('notify', Session::get('sucesso'));
        }

        $opinioes = $this->montar();


        return view('livewire.sugestoes.ver', compact('opinioes'));
    }
}
