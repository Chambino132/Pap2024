<div>    
    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($base == "base")
                        <div>
                                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Lista de Exercicios') }}
                                </h2>
                                <hr class="border-black dark:border-white" style="width: 170px">
                                <div class="flex justify-between">
                                    <div>
                                        <x-text-input wire:model.live='search' class="mt-2 w-96 me-3" placeholder="Pesquisa"></x-text-input>
                                            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('paginationExercicios::updated')">
                                                <option value="10">10 Linhas</option>
                                                <option value="25">25 Linhas</option>
                                                <option value="50">50 Linhas</option>
                                            </select>
                                    </div>
                                    <button class='inline-flex items-center px-4 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="adicionar">Adicionar</button>
                                </div>
                                <hr style="border:1px solid red" class="mt-4 mb-4" >
                            <div>

                                <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
                                    <table class="w-full table-auto">
                                            <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                            
                                                <tr>
                                                    <th class="px-4 py-3 text-left">Nome</th>
                                                    <th class="px-4 py-3 text-left">Descrição</th>
                                                    <th class="px-4 py-3 text-left">Categoria</th>
                                                    <th class="w-1/12 px-4 py-3">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-900 dark:text-slate-900">
                                                @forelse ($exercicios as $exercicio)
                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                                    <td class="px-4 py-3">{{$exercicio->nome}}</td>
                                                    <td class="px-4 py-3">{{$exercicio->descricao}}</td>
                                                    <td class="px-4 py-3">{{$exercicio->catNome}} </td>
                                                    
                                                    <td class="px-4 py-3 text-center">
                                                        <x-dropdown-table>
                                                            <x-slot name="trigger">
                                                                <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                            </x-slot>
                                                            <x-slot name="content">
                                                                <x-dropdown-link-table wire:click='alterar({{$exercicio->id}})'>
                                                                    Alterar
                                                                </x-dropdown-link-table>
                                                                <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deleteexercicio', arguments: {exercicio:{{$exercicio->id}}}})">
                                                                    Excluir
                                                                </x-dropdown-link-table>
                                                            </x-slot>
                                                        </x-dropdown-table>
                                                        
                            
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td class="px-4 py-3" colspan="3">Ainda sem exercicios!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                    </table>
                                </div>
                                <div class="my-2">
                                    {{$exercicios->links(data: ['scrollTo' => false])}}
                                </div>
                            </div>
                    </div>
                    @elseif ($base == "alterar")
                        <header class="flex justify-between">
                            <h2 class="pb-5 text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Altere o Exercicio: ') }} {{$eID->nome}}
                            </h2>
                        </header>
                        <form wire:submit='SalvarAlterar'>
                            <div class="pb-5">
                                <x-input-label for="nome" :value="__('Nome do Exercicio')" />
                                <x-text-input wire:model='nome' id="nome" name="nome" type="text" class="block w-full mt-1" :value="old('nome')" />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />                                
                            </div>
                            <div class="pb-5">
                                <x-input-label for="descricao" :value="__('Descrição')" />
                                <x-text-input wire:model='descricao' id="descricao" name="descricao" type="text" class="block w-full mt-1" :value="old('descricao')" />
                                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                            </div>            
                            <div class="pb-5">
                                <div class="pb-5">
                                <x-input-label for="categoria_id" :value="__('Categoria')" />
                                <select wire:model='categoria_id' id='categoria_id' name='categoria_id' class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{__('Selecione uma Opção')}}</option>
                                    @foreach ($categorias as $categoria)
                                        <option {{ ($categoria->id == $eID->categoria_id) ? 'selected' : '' }} value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('categoria_id')" />                                
                            </div>
                            <div><x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>
                    @elseif ($base == "adicionar")
                        <header class="flex justify-between">
                            <h2 class="pb-5 text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Crie um Exercicio novo') }}
                            </h2>
                        </header>
                        <form wire:submit='SalvarAdicionar'>
                            <div class="pb-5">
                                <x-input-label for="nome" :value="__('Nome do Exercicio')" />
                                <x-text-input wire:model='nome' id="nome" name="nome" type="text" class="block w-full mt-1" :value="old('nome')" />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />                                
                            </div>
                            <div class="pb-5">
                                <x-input-label for="descricao" :value="__('Descrição')" />
                                <x-text-input wire:model='descricao' id="descricao" name="descricao" type="text" class="block w-full mt-1" :value="old('descricao')" />
                                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                            </div>            
                            <div class="pb-5">
                                <div class="pb-5">
                                <x-input-label for="categoria_id" :value="__('Categoria')" />
                                <select wire:model='categoria_id' id='categoria_id' name='categoria_id' class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{__('Selecione uma Opção')}}</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('categoria_id')" />                                
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