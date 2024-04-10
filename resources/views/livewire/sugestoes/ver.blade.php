<div class="py-14">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Lista de Opiniões') }} 
                </h2>
                <hr class="w-36 border-black dark:border-white">
                        <div>
                            <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                                <option value="10">10 Linhas</option>
                                <option value="25">25 Linhas</option>
                                <option value="50">50 Linhas</option>
                            </select>
                            <select wire:model.live='arquivado' class='ms-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40' wire:change="$dispatch('pagination::updated')">
                                <option value="todos">Todos</option>
                                <option value="arquivados">Arquivados</option>
                                <option value="nao arquivados">Não Arquivados</option>
                            </select>
                        </div>
                        
                        <hr style="border:1px solid red" class="mb-4 mt-4" >
                <div>
                    <div class="bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
                        <table class="w-full table-auto">
                                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                    <tr>
                                        <th wire:click='ordenar' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700 cursor-pointer">Autor
                                            @if ($ordena)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                          </svg>
                                        @else
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                          </svg>
                                        @endif</th>
                                        <th class="px-4 py-3 text-left">Opinião</th>
                                        <th class="px-4 py-3 text-left">Arquivado</th>
                                        <th class="w-1/12 px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-900 dark:text-slate-900 ">
                                    @forelse ($opinioes as $opiniao)
                                    <div>
                                        <tr wire:key='{{$opiniao->id}}' class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                            <td class="px-4 py-3 w-48">
                                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-500 rounded-lg">{{$opiniao->name}}</span>
                                            </td>
                                            <td class="px-4 py-3 w-72">{{$opiniao->descricao}}</td>
                                            <td  class="px-4 py-3 w-4">
                                                @if ($opiniao->arquivado)
                                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-500 rounded-lg">Não</span>
                                                @else
                                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-500 rounded-lg">Sim</span>
                                                @endif
                                            </td>
                                            
                                            <td class="px-4 py-3 text-center">
                                                <x-dropdown-table>
                                                    <x-slot name="trigger">
                                                        <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link-table  wire:click="$dispatch('openModal', {component:'modals.confirmacao-deletesugestao', arguments: {sugestao:{{$opiniao->id}}}})">
                                                            Excluir
                                                        </x-dropdown-link-table>
                                                        <x-dropdown-link-table wire:click.prevent='arquivar({{$opiniao->id}})'>
                                                        @if ($opiniao->arquivado)
                                                            Arquivar
                                                        @else
                                                            Desarquivar
                                                        @endif
                                                        </x-dropdown-link-table>
                                                    </x-slot>
                                                </x-dropdown-table>
                                                
                                            </td>
                                        </tr>
                                    </div>
                                    @empty
                                    <tr>
                                        <td class="px-4 py-3 text-left" colspan="5">Ainda sem Opiniões</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                        </table>
                    </div>
                    <div class="my-2">
                        {{$opinioes->links(data: ['scrollTo' => false])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
