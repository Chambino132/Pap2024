<x-app-layout>
    <x-slot name="pageTitle">
        Trabalhadores
    </x-slot>

    @if (Auth::user()->utype == "Admin")
        <div class="lg:flex">
            <div class="lg:w-1/2">
            <livewire:funcionario.users.personal>
            </div>
            <div class="lg:w-1/2">
            <livewire:funcionario.users.funcionario>
            </div>
        </div>
    @else
        <livewire:funcionario.users.personal>
    @endif 
    <livewire:funcionario.users.nao-confirmado>
    
</x-app-layout>
