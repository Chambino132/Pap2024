<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header class="pb-3">
            <h1 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Deseja mesmo excluir esta sugestão?') }}
            </h1>
        </header>
        
        <h2 class="pb-3">Confirmar esta ação vai excluir <strong>permanentemente</strong> este problema!</h2>

        <div class="flex">
            <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="$dispatch('closeModal')">Cancelar</button>

            <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="delConfirm">Confirmar</button>
        </div>

    </div>
</div>

