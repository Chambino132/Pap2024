<div class="py-12 ">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Lista de Entradas') }}
                    </h2>
                    <hr class="w-40 border-black dark:border-white">
                
                <div>
                    <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                    <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                        <option value="10">10 Linhas</option>
                        <option value="25">25 Linhas</option>
                        <option value="50">50 Linhas</option>
                    </select>
                    
                </div>
                
                <hr style="border:1px solid red" class="my-4">
                
                <div class="flex ">
                    <h6 class="py-2 mx-2 font-medium text-gray-900 dark:text-gray-100">Ver entradas de</h6>
                    <x-text-input wire:model.live="firstDate" type="datetime-local" class="px-2"></x-text-input>
                    <h6 class="py-2 mx-2 font-medium text-gray-900 dark:text-gray-100">a</h6>
                    <x-text-input wire:loading.remove wire:model.live='lastDate' type="datetime-local" class="px-2"></x-text-input>
                </div>
                <div class="py-5 ">

                    <div class="bg-white rounded-lg shadow-lg dark:bg-gray-400">
                        <table class="w-full table-auto">
                            <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">

                                <tr>
                                    <th wire:click='ordenar("nome")' class="px-4 py-3 flex text-left dark:hover:bg-red-900 hover:bg-red-700 ">Cliente 
                                        @if ($ordena == 'nome')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                      </svg>
                                    @endif</th>
                                    <th wire:click='ordenar("data")' class="px-4 py-3 text-left dark:hover:bg-red-900 hover:bg-red-700 ">
                                        <div class="flex">
                                            Data e Hora 
                                            @if ($ordena == 'data')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                            </svg>
                                        
                                            @endif
                                        </div></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-slate-900">
                                @forelse ($entradas as $entrada)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                        <td class="px-4 py-3">
                                            {{$entrada->cliente->user->name}}
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-500">{{$entrada->entrada}}</span>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="px-4 py-3" colspan="3">Sem Entradas</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        
                    </div>
                    <div class="my-2">
                        {{ $entradas->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
