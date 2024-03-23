<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Lista de exercicios do plano: ') }} {{$plano->nome}}
            </h2>
            <hr class="w-64 border-black dark:border-white">
        </header>

        <div class="py-8 ">

            <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg">
                <table class="w-full table-auto">
                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
        
                            <tr>
                                <th class="px-4 py-3 text-left">#</th>
                                <th class="px-4 py-3 text-left">Nome</th>
                                <th class="px-4 py-3 text-left">Descrição</th>
                                <th class="px-4 py-3 text-left">Categoria</th>
                                <th class="px-4 py-3 text-left">Repetições</th>
        
                                <th class="w-1/12 px-4 py-3">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 dark:text-slate-900">
                            @forelse ($plano->exercicios as $exercicio)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="px-4 py-3">
                                    {{$exercicio->id}}
                                </td>
                                <td class="px-4 py-3">{{$exercicio->nome}}</td>
                                <td class="px-4 py-3">{{$exercicio->descricao}}</td>
                                <td class="px-4 py-3">{{$exercicio->categoria->nome}}</td>
                                <td class="px-4 py-3 flex">
        
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-500 rounded-lg">{{$exercicio->pivot->repeticoes}}</span>
                                </td>
                                
                                <td class="px-4 py-3 text-center">
                                    <x-dropdown-table>
                                        <x-slot name="trigger">
                                            <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-400 focus:outline-none">&#8943;</button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link-table wire:click="dessassociar({{$exercicio->id}})">
                                                Dessassociar
                                            </x-dropdown-link-table>
                                        </x-slot>
                                    </x-dropdown-table>
                                    
        
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Ainda sem Exercicios!</td>
                                </tr>
                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>   
    </div>
</div>

