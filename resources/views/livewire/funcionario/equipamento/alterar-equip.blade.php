<div>
    <form wire:submit='guardarE'>
        <div class="pb-5">
            <x-input-label for="equipamento" :value="__('Nome do Equipamento')" />
            <x-text-input wire:model='equipamento' type="text" class="block w-full mt-1"/>
            <x-input-error class="mt-2" :messages="$errors->get('equipamento')" />
        </div>
        <div class="pb-5">
            <x-input-label for="dtAquisicao" :value="__('Data de Aquisição')" />
            <x-text-input wire:model='dtAquisicao' type="date" class="block w-full mt-1"/>
            <x-input-error class="mt-2" :messages="$errors->get('dtAquisicao')" />
        </div>
        <div class="pb-5">
            <x-input-label for="preco" :value="__('Preço de Compra')" />
            <x-text-input wire:model='preco' type="text" class="block w-full mt-1"/>
            <x-input-error class="mt-2" :messages="$errors->get('preco')" />
        </div>
        <div>
            <x-primary-button type="submit">{{ __('Associar') }}</x-primary-button>
    </form> 
            <x-secondary-button wire:click="$dispatch('cancelar')">{{ __('Cancelar') }}</x-secondary-button>
        </div>
</div>
