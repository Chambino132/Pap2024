<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="items-center justify-center">
        <div>
            <h2 class="p-3 text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Importar XLSX ou XLS de tecnicos') }}
            </h2>
            <h2 class="px-4 pb-4 text-gray-900 text-md dark:text-gray-100">
                {{__('Foi transferido um ficheiro para o seu computador, por favor preencha-o com os dados e depois insira o ficheiro aqui para ser importado')}}
            </h2>
        </div>
        <div>
            <form wire:submit='importar'>
                <label class="flex flex-col p-10 mx-3 mb-3 text-center border-4 border-double rounded-lg h-30 group">
                    <div class="flex flex-col items-center justify-center h-5 text-center">
                        <p class="text-gray-500 pointer-none "><a
                                class="text-blue-600 hover:underline">Clique aqui</a> para
                            escolher um ficheiro</p>
                    </div>
                    <input type="file" name="file" class="hidden">
                </label>

                <x-primary-button class="mx-3 mb-3">Importar</x-primary-button>
            </form>
        </div>
    </div>
</div>
