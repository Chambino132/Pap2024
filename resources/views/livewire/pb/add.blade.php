<div>
    <h1 class="text-2xl">Registar PB</h1>
    <hr class="w-32 mb-5 border-black dark:border-white">
    
    @if ($equipamentos)

    <form wire:submit="guardar">
        <div class="pb-5">
            <x-input-label :value="__('Maquina')" />
            <select wire:model.live="equipamento_id" class="ml-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option>Escolha Uma Opção</option>
                @foreach($equipamentos as $item)
                    <option value="{{$item->id}}">{{$item->equipamento}} </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('equipamento')" />
        </div>

        

        <div class="pb-5">
            <x-input-label :value="__('Personal Best')" />
            <x-text-input  wire:model.live='pb' class="block w-96 mt-1 ml-3"/>
            <x-input-error class="mt-2" :messages="$errors->get('pb')" />
        </div>

        <x-primary-button>Resgistar</x-primary-button>
    </form>
    @else
    <h1 class="text-2xl">Já tem PB para todas as maquinas!</h1>
    @endif
</div>
