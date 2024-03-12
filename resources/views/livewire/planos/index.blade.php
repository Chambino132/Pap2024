<div>
    @if ($base == "base")
        <div class="py-12 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header class="flex justify-between">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                    {{ __('Lista de Planos') }}    
                                @else
                                    {{ __('Os seus Planos') }}
                                @endif
                                
                            </h2>

                            <button class='inline-flex items-center px-4 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click='adicionar'>Adicionar</button>
                        </header>
                        <table class="w-full border border-spacing-2 border-slate-500">
                            <thead>
                                <th class="px-3 py-2">#</th>
                                <th class="px-3 py-2">Nome</th>
                                <th class="px-3 py-2">Descrição</th>
                                @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                <th class="px-3 py-2">Preço</th>
                                <th class="px-3 py-2">Ações</th>
                                @endif
                            </thead>
                            <tbody>
                                @forelse ($planos as $plano)
                                    <tr class="hover:bg-red-800">
                                        <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-3 py-2 border border-slate-700">{{$plano->id}}</td>
                                        <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-3 py-2 border border-slate-700">{{$plano->nome}}</td>
                                        <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-3 py-2 border border-slate-700">{{$plano->descricao}}</td>
                                        @if (Auth::user()->utype == "Funcionario" || Auth::user()->utype == "Admin")
                                        <td wire:click="$dispatch('openModal', {component: 'planos.exercicio-plano', arguments: {plano: {{$plano->id}}}})" class="px-3 py-2 border border-slate-700">{{$plano->preco}}€</td>
                                            <td class="w-1/4 py-2 border border-slate-700">
                                            <div class="pl-5">
                                                <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="alterar({{$plano->id}})">Alterar</button>

                                                <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deleteplano', arguments: {plano:{{$plano->id}}}})">Excluir</button>

                                                <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25' wire:click="$dispatch('openModal', {component: 'planos.plano-addprob', arguments: {plano: {{$plano->id}}}})">+ Exercicio</button>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Ainda sem maquinas!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($base == "alterar")
        <div class="py-12 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
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
                            <div><x-primary-button type="submit">{{ __('Associar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>                    
                    </div>
                </div>
            </div>
        </div>
    @elseif ($base == "adicionar")
        <div class="py-12 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
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
                            <div><x-primary-button type="submit">{{ __('Associar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>                    
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>