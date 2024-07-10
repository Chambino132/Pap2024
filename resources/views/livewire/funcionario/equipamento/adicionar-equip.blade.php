<div>
    <header class="flex justify-between pb-4">
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Adicionar um Equipamento') }}
        </h2>
    </header>

    <form wire:submit.prevent='Salvar'>
        <div class="pb-5">
            <x-input-label for="equipamento" :value="__('Nome do Equipamento')" />
            <x-text-input wire:model.live='equipamento' type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('equipamento')" />
        </div>
        <div class="pb-5">
            <x-input-label for="dtAquisicao" :value="__('Data de Aquisição')" />
            <x-text-input wire:model.live='dtAquisicao' type="date" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('dtAquisicao')" />
        </div>
        <div class="pb-5">
            <x-input-label for="preco" :value="__('Preço')" />
            <x-text-input wire:model.live='preco' type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('preco')" />
        </div>

        <div>
            <x-primary-button>Salvar</x-primary-button>
    </form>

    <x-secondary-button wire:click="$dispatch('cancelar')">{{ __('Cancelar') }}</x-secondary-button>
</div>
