<div>
    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
        {{ __('Altere as Informações do Equipamento') }}
    </h2>
    
    <h3 class="pt-3">Selecione o que deseja alterar</h3>
    <div class="pb-5">
        <select wire:model.live="tipo" id="tipo" name="tipo"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{__('Selecione uma Opção')}}</option>
            <option value="Equipamento">{{ __('Alterar Equipamento') }}</option>
            @if ($equipamento->problemas->count() > 0)
            <option value="Problema">{{ __('Alterar Problema') }}</option>
            @endif
        </select>
    </div>
    
    <hr style="border:1px solid red" class="mb-3">

    @if ($tipo == "Equipamento")
        <livewire:funcionario.equipamento.alterar-equip :altEquipamento="$equipamento">
    @elseif($tipo == "Problema")
        <livewire:funcionario.equipamento.alterar-prob :equipamento="$equipamento">
    @else
        <x-secondary-button wire:click="$dispatch('cancelar')">{{ __('Cancelar') }}</x-secondary-button>
    @endif

    
    
</div>
