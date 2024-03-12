<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Planos de Treino') }}
        </h2>
    </x-slot>

    @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
        <livewire:planos.index>
        <livewire:planos.categorias>
        <livewire:planos.exercicios>
    @else
        <livewire:planos.cliente.index>
    @endif


</x-app-layout>