<div>
    @if ($altProblema == false)
<div class="pb-5">
    <x-input-label :value="__('Problema no Equipamento')" />
    <select wire:model='problema_id'
        class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:change="$dispatch('SelProblema::changed')">
        @if (!$repeted)
        <option selected> {{__('Selecione uma Opção')}}</option>
        @endif
        @foreach ($equipamento->problemas as $problema)
        <option value="{{$problema->id}}">{{$problema->problema}}</option>
        @endforeach
    </select>
</div>
@else
<form wire:submit='guardarP'>
    <x-input-label for="problema" :value="__('Problema do Equipamento')" />
    <div class="flex pb-5">
        <x-text-input wire:model='problema' id="problema" name="problema" type="text" class="block w-full mt-1 w-7/8"
            :value="old('problema')" />
        <x-input-error class="mt-2" :messages="$errors->get('problema')" />

        @if ($equipamento->problemas->count() > 1)
        <x-secondary-button class="w-1/8" wire:click='retroceder'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z" />
                <path
                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466" />
            </svg>
        </x-secondary-button>
        @endif

    </div>
    <div class="pb-5">
        <x-input-label for="estado" :value="__('Estado do Problema')" />
        <select wire:model='estado' id="estado" name="estado"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @if ($Tempproblema->estado == "Por Resolver")
            <option selected value="Por Resolver">Por Resolver</option>
            <option value="Em Progresso">Em Progresso</option>
            <option value="Resolvido">Resolvido</option>
            @elseif ($Tempproblema->estado == "Em Progresso")
            <option value="Por Resolver">Por Resolver</option>
            <option selected value="Em Progresso">Em Progresso</option>
            <option value="Resolvido">Resolvido</option>
            @else
            <option value="Por Resolver">Por Resolver</option>
            <option value="Em Progresso">Em Progresso</option>
            <option selected value="Resolvido">Resolvido</option>
            @endif
        </select>
    </div>
    @endif
    <div>
        <x-primary-button type="submit">{{ __('Associar') }}</x-primary-button>
</form>
        <x-secondary-button wire:click="$dispatch('cancelar')">{{ __('Cancelar') }}</x-secondary-button>
    </div>
</div>
