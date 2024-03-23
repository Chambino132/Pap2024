<div>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Adicionar um Problema') }}
        </h2>
    
    <form wire:submit='salvarP'>
        <div class="pb-5 pt-5">
            <x-input-label for="problema" :value="__('Descrição do Problema')" />
            <x-text-input wire:model='problema' id="problema" name="problema" type="text"
                class="block w-full mt-1" :value="old('problema')" />
            <x-input-error class="mt-2" :messages="$errors->get('problema')" />
        </div>
        <div>
            <x-input-label for="estado" :value="__('Estado do Problema')" />
            <select wire:model='estado' id="estado" name="estado"
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{__('Selecione uma Opção')}}</option>
                <option value="Por Resolver">Por Resolver</option>
                <option value="Em Progresso">Em Progresso</option>
                <option value="Resolvido">Resolvido</option>
            </select>
        </div>

        <div class="pt-3">
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
    </form>
    <x-secondary-button wire:click="$dispatch('cancelar')">{{ __('Cancelar') }}</x-secondary-button>
    </div>
