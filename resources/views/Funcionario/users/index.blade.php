<x-app-layout>
    <x-slot name="pageTitle">
        Utilizadadores
    </x-slot>

    <div class="flex">
        <livewire:funcionario.users.clientes>
        <livewire:funcionario.users.personal>
    </div>

    <livewire:funcionario.users.nao-confirmado>
    
</x-app-layout>
