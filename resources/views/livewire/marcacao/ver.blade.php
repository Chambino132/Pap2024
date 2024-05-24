<div>

        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('As suas Marcações') }}
        </h2>
        <div>
            <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                <option value="10">10 Linhas</option>
                <option value="25">25 Linhas</option>
                <option value="50">50 Linhas</option>
            </select>
            <select wire:model.live='est' class='ms-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40' wire:change="$dispatch('pagination::updated')">
                <option value="todos">Todos</option>
                <option value="pendente">Pedentes</option>
                <option value="aceite">Aceites</option>
                <option value="recusado">Recusados</option>
                <option value="cancelado">Cancelados</option>
            </select>
        </div>
        <hr style="border:1px solid red" class="mb-4 mt-4" >
    <div>
        <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
            <table class="w-full table-auto">
                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Data</th>
                        <th class="px-4 py-3 text-left">Hora</th>
                        @if (Auth::user()->utype == "Cliente")
                        <th class="px-4 py-3 text-left">Responsável</th>
                        @elseif (Auth::user()->utype == "Personal")
                        <th class="px-4 py-3 text-left">Cliente</th>
                        @endif
                        <th class="px-4 py-3 text-left">Atividade</th>
                        <th class="w-1/12 px-4 py-3">Estado</th>
                        <th class="w-1/12 px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-slate-900">
                    @forelse ($marcacoes as $marcacao)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                        <td class="px-4 py-3">{{ $marcacao->dia }} </td>
                        <td class="px-4 py-3">{{ $marcacao->hora }}</td>
                        <td class="px-4 py-3">{{ $marcacao->name }}</td>
                        <td class="px-4 py-3">{{ $marcacao->atividade }}</td>
                        <td class="px-4 py-3">

                            @if ($EstadoChan == false)
                                @if ($marcacao->estado == "aceite")
                                <span
                                    class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-green-200 dark:bg-green-400 rounded-lg">Aceite</span>
                                @elseif ($marcacao->estado == "recusada")
                                <span
                                    class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-red-200 dark:bg-red-400 rounded-lg">Recusado</span>
                                @elseif ($marcacao->estado == "cancelada")
                                <span
                                    class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-yellow-200 dark:bg-yellow-400 rounded-lg">Cancelado</span>
                                @else
                                <span
                                    class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-500 rounded-lg">Pendente</span>
                                @endif


                                    
                            @elseif ($loop->iteration == $iteration)
                            <div class="flex">
                                <select wire:model='estado' id="estado" name="estado"
                                    wire:change="StoreEstado({{$marcacao->id}})"
                                    class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-500 rounded-lg border-0 h-10">
                                    <option selected value="pendente">pendente</option>
                                    <option value="aceite">aceitar</option>
                                    <option value="recusada">recusar</option>
                                </select>
                                <button wire:click='CanMud'
                                    class="ms-2 px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z" />
                                        <path
                                            d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466" />
                                    </svg></button> 
                            </div>
                            @else
                            @if ($marcacao->estado == "aceite")
                            <span
                                class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-green-200 dark:bg-green-400 rounded-lg">{{
                                $marcacao->estado}}</span>
                            @elseif ($marcacao->estado == "recusada")
                            <span
                                class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-red-200 dark:bg-red-400 rounded-lg">{{
                                $marcacao->estado}}</span>
                            @elseif ($marcacao->estado == "cancelada")
                            <span
                                class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-yellow-200 dark:bg-yellow-400 rounded-lg">{{
                                $marcacao->estado}}</span>
                            @else
                            <span
                                class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">{{
                                $marcacao->estado}}</span>
                            @endif
                            @endif
                        </td>
                        
                            <td class="px-4 py-3 text-center">
                                <x-dropdown-table>
                                    <x-slot name="trigger">
                                        <button wire:click="changeClass"
                                            class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                    </x-slot>
                                    <x-slot name="content">
                                    @if ($marcacao->estado == "cancelada" || $marcacao->estado == "recusada")
                                        <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'marcacao.modal-motivo' , arguments: {marcacao: {{$marcacao->id}}}})">
                                            Ver Motivo
                                        </x-dropdown-link-table>
                                    @elseif ($marcacao->estado == "pendente" && Auth::user()->utype == "Personal")
                                        <x-dropdown-link-table wire:click='MudEstado({{$loop->iteration}})'>
                                            Mudar Estado
                                        </x-dropdown-link-table>
                                    @else
                                        <x-dropdown-link-table wire:click='Cancelar({{$marcacao->id}})'>
                                            Cancelar
                                        </x-dropdown-link-table>
                                   @endif
                                    </x-slot>
                                </x-dropdown-table>
                            </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-4 py-3" colspan="6">Ainda sem Marcações!</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>