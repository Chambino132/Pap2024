<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Adicione exercicios ao plano: ') }} {{$plano->nome}}
            </h2>
        </header>

        <div class="pt-2 pb-5">
            <form wire:submit="salvar">
                <div class="pb-5">
                    <select multiple wire:model='exercicio_id' id="exercicio_id" name="exercicio_id"
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($exercicios as $exercicio)
                            <option value="{{ $exercicio->id }}">{{ $exercicio->nome }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="pb-5">
                        <x-input-label for="repeticoes" :value="__('Repetições')" />
                        <x-text-input wire:model='repeticoes' id="repeticoes" name="repeticoes" type="text" class="block w-full mt-1" :value="old('repeticoes')" />
                        <x-input-error class="mt-2" :messages="$errors->get('repeticoes')" />
                    </div>
                <x-primary-button>Associar</x-primary-button>
            </form>
        </div>        
    </div>
</div>