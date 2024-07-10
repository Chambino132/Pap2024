<div>
    <div>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Lista de Perdidos e Achados') }}
            
        </h2>
        <hr class="w-64 border-black dark:border-white" >

        <div>
            <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                <option value="10">10 Linhas</option>
                <option value="25">25 Linhas</option>
                <option value="50">50 Linhas</option>
            </select>
            <select wire:model.live='estado' class='w-40 border-gray-300 rounded-md shadow-sm ms-3 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600' wire:change="$dispatch('pagination::updated')">
                <option value="todos">Todos</option>
                <option value="porEncontrar">Por Encontrar</option>
                <option value="encontrado">Encontrados</option>
                <option value="devolvido">Devolvidos</option>
            </select>
        </div>
        
        <hr style="border:1px solid red" class="mt-4 mb-4">
        
        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-400 {{$class}}">    
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                        <tr>
                            <th wire:click='ordenar("item")' class="flex px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">Item
                                @if ($ordena == 'item')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg>
                                @endif
                            </th>
                            <th class="px-4 py-3 text-left">Imagem</th>
                            <th wire:click='ordenar("localizacao")' class="flex px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">Localização 
                                @if ($ordena == 'localizacao')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg>
                                @endif
                            </th>
                            <th class="px-4 py-3 text-left">Estado</th>
                            <th class="w-1/12 px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
                        @forelse ($perdidos as $perdido)
                        <div >
                            <tr  class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="px-4 py-3">
                                    {{$perdido->item}}
                                </td>
                                <td class="px-4 py-3"><img class="h-20" src="{{Storage::url($perdido->imagem)}}"></td>
                                <td class="px-4 py-3">
                                    {{$perdido->localizacao}}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($perdido->estado == 'encontrado')
                                        <span class="px-4 py-2 text-gray-600 bg-yellow-200 rounded-lg dark:text-gray-800 dark:bg-yellow-400">Encontrado</span>
                                    @else
                                        <span class="px-4 py-2 text-gray-600 bg-green-200 rounded-lg dark:text-gray-800 dark:bg-green-400">Devolvido</span>
                                    @endif
                                </td>
                                @if ($perdido->estado != 'devolvido')
                                    
                                <td class="px-4 py-3 text-center">
                                    <x-dropdown-table>
                                        <x-slot name="trigger">
                                            <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link-table wire:click='mudarEstado({{$perdido->id}})'>
                                                Mudar estado
                                            </x-dropdown-link-table>
                                        </x-slot>
                                    </x-dropdown-table>
                                </td>
                                @endif
                            </tr>
                        </div>
                        @empty
                            <tr>
                                <td class="px-4 py-3" colspan="3">Ainda sem imagens</td>
                            </tr>    
                        @endforelse
                    </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$perdidos->links(data: ['scrollTo' => false])}}
        </div>
       
    </div>
</div>

