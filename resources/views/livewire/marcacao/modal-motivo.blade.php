<div @click.outside="$dispatch('closeModal')" class="mx-auto max-w-7xl">
    <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class="text-3xl text-center mb-5">Motivos para Cancelamento</h1>
            <div class="flex justify-center">
                @if ($adding)
                <form wire:submit="guardarM">
                    <textarea wire:model="motivo" rows="5" cols="40" placeholder="Insira aqui o motivo" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mb-2"></textarea>
                    <button class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-md text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 w-full h-12">Guardar</button>
                </form>
                @else
                    A Marcacao foi {{$marcacao->estado}} porque "{{$marcacao->motivo}}".
                @endif
            </div>
        </div>
      </div>
</div>
