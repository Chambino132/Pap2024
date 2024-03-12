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
                        <table class="w-full border border-spacing-2 border-slate-500">
                            <thead>
                                <th class="px-3 py-2">#</th>
                                <th class="px-3 py-2">Nome</th>
                                <th class="px-3 py-2">Ações</th>
                            </thead>
                            <tbody>
                                @forelse ($categorias as $categoria)
                                    <tr class="hover:bg-red-800">
                                        <td class="px-3 py-2 border border-slate-700">{{$categoria->id}}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{$categoria->nome}}</td>
                                        <td class="w-2/12 py-2 border border-slate-700">
                                            <div class="pl-5">
                                                <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="alterar({{$categoria->id}})">Alterar</button>

                                                <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deletecategoria', arguments: {categoria:{{$categoria->id}}}})">Excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Ainda sem categorias!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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