<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Planos de Treino') }}
        </h2>
    </x-slot>
    
    @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
        @if ($cliente && $plano)
            <livewire:planos.confirm-compra :cliente=$cliente :plano=$plano>
        @endif
    @endif

    <livewire:planos.index>

    @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")

        
        <livewire:planos.categorias>
        <livewire:planos.exercicios>
    @else
        <livewire:planos.cliente.index>
    @endif


</div>