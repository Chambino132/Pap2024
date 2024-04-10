<div>
    @if ($base == "base")
        <div class="py-12 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg ">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                    {{ __('Lista de Planos') }}    
                                @else
                                    {{ __('Os seus Planos') }}
                                @endif
                                <hr class="w-36 border-black dark:border-white">
                            </h2>
                            <div class="md:flex justify-between">
                                <div>
                                    <x-text-input wire:model.live='search' class="w-96 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                                    <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('paginationPlanos::updated')">
                                        <option value="10">10 Linhas</option>
                                        <option value="25">25 Linhas</option>
                                        <option value="50">50 Linhas</option>
                                    </select>
                                </div>
                                @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                    <button class='inline-flex items-center self-center px-4 py-2 my-2  text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click='adicionar'>Adicionar</button>
                                @endif
                            </div>
                            <hr style="border:1px solid red" class="mb-4 mt-4" >


                    <div>

                        <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
                            <table class="w-full table-auto">
                                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                    
                                        <tr>
                                            <th wire:click='ordenar("nome")' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Nome 
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
                                            <th wire:click='ordenar("descricao")' class="px-4 py-3 text-left dark:hover:bg-red-900 hover:bg-red-700">
                                                <div class="flex">
                                                    Descrição 
                                                    @if ($ordena == 'descricao')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                            </th>
                                            @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                            <th wire:click='ordenar("preco")' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Preço 
                                                @if ($ordena == 'preco')
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
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-900 dark:text-slate-900">
                                        @forelse ($planos as $plano)
                                        <tr wire:key='{{$plano->id}}' class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                            <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-4 py-3">{{$plano->nome}}</td>
                                            <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-4 py-3">{{$plano->descricao}}</td>
                                            @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                            <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-4 py-3 flex">
                                                <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-green-200 dark:bg-green-400 rounded-lg">{{$plano->preco}}€</span>
                                            </td>
                                            
                                            <td class="px-4 py-3 text-center">
                                                <x-dropdown-table>
                                                    <x-slot name="trigger">
                                                        <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link-table wire:click="alterar({{$plano->id}})">
                                                            Alterar
                                                        </x-dropdown-link-table>
                                                        <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deleteplano', arguments: {plano:{{$plano->id}}}})">
                                                            Excluir
                                                        </x-dropdown-link-table>
                                                        <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'planos.plano-addprob', arguments: {plano: {{$plano->id}}}})">
                                                            + Exercicio
                                                        </x-dropdown-link-table>
                                                    </x-slot>
                                                </x-dropdown-table>
                                            </td>
                                            @endif
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Ainda sem Planos!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="my-2">
                        {{$planos->links(data: ['scrollTo' => false])}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($base == "alterar")
        <div class="py-12 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
			            <header class="flex justify-between">
                            <h2 class="pb-5 text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Altere o Plano que deseja') }}
                            </h2>
                        </header>
                        <form wire:submit='SalvarAlterar'>
                            <div class="pb-5">
                                <x-input-label for="nome" :value="__('Nome do Plano')" />
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
                                <x-input-label for="preco" :value="__('Preço')" />
                                <x-text-input wire:model='preco' id="preco" name="preco" type="text" class="block w-full mt-1" :value="old('preco')" />
                                <x-input-error class="mt-2" :messages="$errors->get('preco')" />                                
                            </div>
                            <div><x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>                    
                    </div>
                </div>
            </div>
        </div>
    @elseif ($base == "adicionar")
        <div class="py-12 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
			            <header class="flex justify-between">
                            <h2 class="pb-5 text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Crie um novo Plano!') }}
                            </h2>
                        </header>
                        <form wire:submit='SalvarAdicionar'>
                            <div class="pb-5">
                                <x-input-label for="nome" :value="__('Nome do Plano')" />
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
                                <x-input-label for="preco" :value="__('Preço')" />
                                <x-text-input wire:model='preco' id="preco" name="preco" type="text" class="block w-full mt-1" :value="old('preco')" />
                                <x-input-error class="mt-2" :messages="$errors->get('preco')" />                                
                            </div>
                            <div><x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>                    
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>