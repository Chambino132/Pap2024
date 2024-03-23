<div>
    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Clientes') }}
                        </h2>
                        <hr class="border-black dark:border-white" style="width: 153px">
                        <div>
                            <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                                <option value="10">10 Linhas</option>
                                <option value="25">25 Linhas</option>
                                <option value="50">50 Linhas</option>
                            </select>
                        </div>
                        
                        <hr style="border:1px solid red" class="mb-4 mt-4" >

                    <div>
                        <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
                            <table class="w-full table-auto">
                                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                        <tr>
                                            <th class="px-4 py-3 text-left">#</th>
                                            <th wire:click='ordenar' class="px-4 py-3 flex text-left dark:hover:bg-red-900 hover:bg-red-700">Nome  
                                                @if ($ordena)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                              </svg>
                                            @else
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                              </svg>
                                            @endif</th>
                                            <th class="px-4 py-3 text-left">Email</th>
                                            <th class="px-4 py-3">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-900 dark:text-slate-900">
                                        @forelse ($usersC as $userC)
                                        <tr wire:key='{{$userC->id}}' class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                            <td wire:click="$dispatch('openModal', {component: 'funcionario.users.cliente-modal', arguments:{UCliente: {{$userC->cliente->id}}}})" class="px-4 py-3">
                                                {{ $userC->id }}
                                            </td>
                                            <td wire:click="$dispatch('openModal', {component: 'funcionario.users.cliente-modal', arguments:{UCliente: {{$userC->cliente->id}}}})" class="px-4 py-3">{{ $userC->name }}</td>
                                            <td wire:click="$dispatch('openModal', {component: 'funcionario.users.cliente-modal', arguments:{UCliente: {{$userC->cliente->id}}}})" class="px-4 py-3">{{ $userC->email }}</td> 
                                            <td class="px-4 py-3 text-center">
                                              <x-dropdown-table>
                                                <x-slot name="trigger">
                                                  <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                </x-slot>
                                                <x-slot name="content">
                                                  <x-dropdown-link-table wire:click='saveEntrada({{$userC->id}})'>
                                                      + Entrada
                                                  </x-dropdown-link-table>
                                                </x-slot>
                                              </x-dropdown-table>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="px-4 py-3" colspan="3">Sem Clientes!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="my-2">
                        {{$usersC->links(data: ['scrollTo' => false])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>