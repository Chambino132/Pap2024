<div>
    <header>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('As suas Marcações') }}
        </h2>
    </header>

    <div class="py-8 ">
        <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
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
                        <tr class="hover:bg-gray-100">
                            @forelse ($marcacoes as $marcacao)
                            <td class="px-4 py-3">{{ $marcacao->dia }}</td>
                            <td class="px-4 py-3">{{ $marcacao->hora }}</td>
                            @if (Auth::user()->utype == "Cliente")
                            <td class="px-4 py-3">{{ $marcacao->personal->user->name }}</td>
                            @elseif (Auth::user()->utype == "Personal")
                            <td class="px-4 py-3">{{ $marcacao->cliente->name }}</td>
                            @endif
                            <td class="px-4 py-3">{{ $marcacao->personal->atividade->atividade }}</td>
                            <td class="px-4 py-3">

                                @if ($EstadoChan == false)
                                @if ($marcacao->estado == "aceite")
                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-green-200 dark:bg-green-400 rounded-lg">{{ $marcacao->estado}}</span>
                                @elseif ($marcacao->estado == "recusado")
                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-red-200 dark:bg-red-400 rounded-lg">{{ $marcacao->estado}}</span>
                                @elseif ($marcacao->estado == "cancelado")
                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-yellow-200 dark:bg-yellow-400 rounded-lg">{{ $marcacao->estado}}</span>
                                @else
                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">{{ $marcacao->estado}}</span>
                                @endif

                                
                                    
                                @elseif ($loop->iteration == $iteration)
                                <div class="flex">
                                    <select wire:model='estado' id="estado" name="estado" wire:change="StoreEstado({{$marcacao->id}})"
                                    class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg border-0 h-10" >
                                    <option selected value="pendente">pendente</option>
                                    <option value="aceite">aceitar</option>
                                    <option value="recusado">recusar</option>
                                </select>
                                <button wire:click='CanMud' class="ms-2 px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                                  </svg></button>
                            </div>
                                @else
                                    @if ($marcacao->estado == "aceite")
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-green-200 dark:bg-green-400 rounded-lg">{{ $marcacao->estado}}</span>
                                    @elseif ($marcacao->estado == "recusado")
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-red-200 dark:bg-red-400 rounded-lg">{{ $marcacao->estado}}</span>
                                    @elseif ($marcacao->estado == "cancelado")
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-yellow-200 dark:bg-yellow-400 rounded-lg">{{ $marcacao->estado}}</span>
                                    @else
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">{{ $marcacao->estado}}</span>
                                    @endif
                                @endif
                            </td>
                            
                            <td class="px-4 py-3 text-center">
                                <x-dropdown-table>
                                    <x-slot name="trigger">
                                        <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link-table wire:click='Cancelar({{$marcacao->id}})'>
                                            Cancelar
                                        </x-dropdown-link-table>
                                        @if ($marcacao->estado == "pendente" && Auth::user()->utype == "Personal")
                                        <x-dropdown-link-table wire:click='MudEstado({{$loop->iteration}})'>
                                            Mudar Estado
                                        </x-dropdown-link-table>
                                        @endif
                                    </x-slot>
                                </x-dropdown-table>
                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Ainda sem Marcações!</td>
                        </tr>
                    @endforelse
                        
                    </tbody>
            </table>
        </div>
    </div>
</div>
