<?php

namespace App\Livewire\Funcionario\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Database\Eloquent\Collection;

class Personal extends Component
{

    use WithPagination;

    public int $perPage = 10;
    public string $search = '';

    #[On('pagination::updated')]
    public function updatingSearch()
    {
        $this->resetPage('personalPage');
    }

    public function render()
    {
        $personals = $this->montar();

        return view('livewire.funcionario.users.personal', compact('personals'));
    }

    #[On('personal::created')]
    public function montar() 
    {
        $personals = User::query()
        ->where('utype', 'Personal')
        ->where('name', 'like', '%'.$this->search.'%')
        ->paginate($this->perPage,['*'], 'personalPage');

        return $personals;
    }

}
