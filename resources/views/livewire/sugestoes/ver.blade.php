<div class="py-14">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Opiniões') }} 
                </h2>

                <div class="py-8 ">
                    <div class="bg-white dark:bg-gray-300 rounded-b-lg shadow-lg">
                        <table class="w-full table-auto">
                                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left">#</th>
                                        <th class="px-4 py-3 text-left">Autor</th>
                                        <th class="px-4 py-3 text-left">Titulo</th>
                                        <th class="px-4 py-3 text-left">Opinião</th>
                                        <th class="w-1/12 px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-900 dark:text-slate-900 ">
                                    @forelse ($opinioes as $opiniao)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-3">
                                            {{$opiniao->id}}
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">{{$opiniao->user->name}}</span>
                                        </td>
                                        <td class="px-4 py-3">{{$opiniao->titulo}}</td>
                                        <td class="px-4 py-3">{{$opiniao->descricao}}</td>
                                        
                                        
                                        <td class="px-4 py-3 text-center">
                                            <x-dropdown-table>
                                                <x-slot name="trigger">
                                                    <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link-table  wire:click="$dispatch('openModal', {component:'modals.confirmacao-deletesugestao', arguments: {sugestao:{{$opiniao->id}}}})">
                                                        Excluir
                                                    </x-dropdown-link-table>
                                                    <x-dropdown-link-table>
                                                        Arquivar
                                                    </x-dropdown-link-table>
                                                </x-slot>
                                            </x-dropdown-table>
                                            
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">Ainda sem Opiniões</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
