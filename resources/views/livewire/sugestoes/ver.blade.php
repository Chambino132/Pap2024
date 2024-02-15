<div class="py-14">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Opiniões') }} 
                </h2>
                <table class="w-full mt-3 border table-fixed border-slate-700 border-spacing-2 dark:text-gray-100 dark:border-gray-500">
                    <thead>
                    <tr>
                        <th class="px-3 py-2">#</th>
                        <th class="px-3 py-2">Autor</th>
                        <th class="px-3 py-2">Titulo</th>
                        <th class="px-3 py-2">Opinião</th>
                        <th class="px-3 py-2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($opinioes as $opiniao)
                        <tr>
                            <th class="px-3 py-2 border border-slate-500">{{$opiniao->id}}</th>
                            <th class="px-3 py-2 border border-slate-500">{{$opiniao->user->name}}</th>
                            <th class="px-3 py-2 border border-slate-500">{{$opiniao->titulo}}</th>
                            <th class="px-3 py-2 border border-slate-500">{{$opiniao->descricao}}</th>
                            <th class="px-3 py-2 border border-slate-500"><button wire:click="$dispatch('openModal', {component:'modals.confirmacao-deletesugestao', arguments: {sugestao:{{$opiniao->id}}}})" class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'>Excluir</button> <x-secondary-button class="ms-2">Arquivar</x-secondary-button></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
