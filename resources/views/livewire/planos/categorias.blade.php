<div>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($base == "base")
                        <header class="flex justify-between">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Categorias') }}
                            </h2>

                            <button class='inline-flex items-center px-4 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click='adicionar'>Adicionar</button>
                        </header>

                        <div class="py-8 ">

                            <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                        
                                            <tr>
                                                <th class="px-4 py-3 text-left">#</th>
                                                <th class="px-4 py-3 text-left">Nome</th>
                                                <th class="w-1/12 px-4 py-3">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-900 dark:text-slate-900">
                                            @forelse ($categorias as $categoria)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-3">
                                                    {{$categoria->id}}
                                                </td>
                                                <td class="px-4 py-3">{{$categoria->nome}} </td>
                                                
                                                <td class="px-4 py-3 text-center">
                                                    <x-dropdown-table>
                                                        <x-slot name="trigger">
                                                            <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
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
                            <div><x-primary-button type="submit">{{ __('Associar') }}</x-primary-button>
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