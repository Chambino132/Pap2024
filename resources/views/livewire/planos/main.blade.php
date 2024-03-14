<div>
    <x-slot name="pageTitle">
        {{ __('Planos de Treino') }}
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