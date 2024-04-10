<div>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($base == "base")

                            <h2 class="text-xl font-medium text-gray-800 dark:text-gray-100">
                                {{ __('Lista de Categorias') }}
                            </h2>
                            <hr class="w-44 border-black dark:border-white">

                            <div class="flex justify-between">
                                <div>
                                    <x-text-input wire:model.live='search' class="w-96 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                                    <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('paginationCategorias::updated')">
                                        <option value="10">10 Linhas</option>
                                        <option value="25">25 Linhas</option>
                                        <option value="50">50 Linhas</option>
                                    </select>
                                </div>
                            <button class='inline-flex items-center px-4 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click='adicionar'>Adicionar</button>

                            </div>
                            <hr style="border:1px solid red" class="mb-4 mt-4" >
                        <div >

                            <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                            <tr>
                                                <th wire:click='ordenar' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Nome 
                                                    @if ($ordena == 'nome')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                        </svg>
                                                        @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                                        </svg>
                                                    @endif
                                                </th>
                                                <th class="px-4 py-3 text-left">Exercicios</th>
                                                <th class="w-1/12 px-4 py-3">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-900 dark:text-slate-900">
                                            @forelse ($categorias as $categoria)
                                            <tr wire:key='{{$categoria->id}}' class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                                <td class="px-4 py-3">{{$categoria->nome}} </td>
                                                <td class="px-4 py-3">{{$categoria->exercicios->count()}} </td>
                                                <td class="px-4 py-3 text-center">
                                                    <x-dropdown-table>
                                                        <x-slot name="trigger">
                                                            <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <x-dropdown-link-table wire:click="alterar({{$categoria->id}})">
                                                                Alterar
                                                            </x-dropdown-link-table>
                                                            <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deletecategoria', arguments: {categoria:{{$categoria->id}}}})">
                                                                Excluir
                                                            </x-dropdown-link-table>
                                                        </x-slot>
                                                    </x-dropdown-table>
                                                    
                        
                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Ainda sem categorias!</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                </table>
                            </div>
                            <div class="my-2">
                                {{$categorias->links(data: ['scrollTo' => false])}}
                            </div>
                        </div>
                    @elseif ($base == "alterar")
                        <header class="flex justify-between">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Altere a categoria: ') }} {{$cID->nome}}
                            </h2>
                        </header>                        
                        <form wire:submit='SalvarAlterar'>
                            <div class="pb-5">
                                <x-input-label for="nome" :value="__('Nome da Categoria')" />
                                <x-text-input wire:model='nome' id="nome" name="nome" type="text" class="block w-full mt-1" :value="old('nome')" />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />                                
                            </div>
                            <div><x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>
                    @elseif ($base == "adicionar")
                        <header class="flex justify-between">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Crie uma categoria') }}
                            </h2>
                        </header>                        
                        <form wire:submit='SalvarAdicionar'>
                            <div class="pb-5">
                                <x-input-label for="nome" :value="__('Nome da Categoria')" />
                                <x-text-input wire:model='nome' id="nome" name="nome" type="text" class="block w-full mt-1" :value="old('nome')" />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />                                
                            </div>
                            <div><x-primary-button type="submit">{{ __('Criar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>                           
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>