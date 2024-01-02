<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <livewire:funcionario.users.clientes>
        <livewire:funcionario.users.personal>
    </div>

    <livewire:funcionario.users.nao-confirmado>
    
</x-app-layout>
