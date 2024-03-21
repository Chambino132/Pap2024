<div>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Lista de Equipamentos') }}
            <hr class="w-52 border-black dark:border-white">
        </h2>

    <div class="flex justify-between">
        <div>
            <x-text-input wire:model.live='search' class="w-96 mt-2 me-3" wire:blur="$dispatch('pagination::updated')" placeholder="Pesquisa"></x-text-input>
            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                <option value="10">10 Linhas</option>
                <option value="25">25 Linhas</option>
                <option value="50">50 Linhas</option>
            </select>
        </div>
        <button
        class='inline-flex items-center px-5 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3'
        wire:click="adicionar">Adicionar</button>
    </div>
    <hr style="border:1px solid red" class="mb-4 mt-4" >
        <div class="bg-white dark:bg-gray-400 rounded-lg shadow-lg">
            <table class="w-full table-auto">
                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th wire:click="ordena('equipamento')" class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Equipamento  
                                @if ($ordenaPor == 'equipamento')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                                @endif
                                </th>
                        <th wire:click='ordena("data")' class="px-4 py-3 text-left dark:hover:bg-red-900 hover:bg-red-700"> 
                            <div class="flex"> Data de Aquisição 
                                @if ($ordenaPor == 'data')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                                @endif
                                </div></th>
                        <th wire:click='ordena("preco")' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Preço  
                                @if ($ordenaPor == 'preco')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                                @endif
                                </th>
                        <th class="w-1/12 px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-slate-900">
                    @forelse ($equipamentos as $maquina)
                    <div class="hidden">n</div>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">{{$maquina->id}}</td>
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">{{$maquina->equipamento}}</td>
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">{{$maquina->dtAquisicao}}</td>
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">
                            <span
                                class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-500">{{$maquina->preco}}€</span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <x-dropdown-table>
                                <x-slot name="trigger">
                                    <button
                                        class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link-table wire:click="alterar({{$maquina->id}})">
                                        Alterar
                                        </x-dropdown-link>
                                        <x-dropdown-link-table
                                            wire:click="$dispatch('openModal', {component: 'modals.confirmacao-delete', arguments: {maquina:{{$maquina->id}}}})">
                                            Excluir
                                            </x-dropdown-link>
                                            <x-dropdown-link-table wire:click='add({{$maquina->id}})'>
                                                + Problema
                                            </x-dropdown-link>
                                </x-slot>
                            </x-dropdown-table>
                        </td>
                    </tr>
                    @empty
                    <td class="px-4 py-3" colspan="3">Sem maquinas!</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$equipamentos->links(data: ['scrollTo' => false])}}
        </div>
</div>
