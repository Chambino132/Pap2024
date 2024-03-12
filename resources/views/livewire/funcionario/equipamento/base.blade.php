<div>

    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($alterarC == false)
                        <header class="flex justify-between">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Equipamentos') }}
                            </h2>

                            <button class='inline-flex items-center px-4 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click='mudarC'>Adicionar</button>
                        </header>

                        <div class="py-8 ">
                            <div class="bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                            <tr>
                                                <th class="px-4 py-3 text-left">#</th>
                                                <th class="px-4 py-3 text-left">Equipamento</th>
                                                <th class="px-4 py-3 text-left">Data de Aquisição</th>
                                                <th class="px-4 py-3 text-left">Preço</th>
                                                <th class="w-1/12 px-4 py-3">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-900 dark:text-slate-900">
                                            @forelse ($maquinas as $maquina)
                                            <tr class="hover:bg-gray-100">
                                                <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})" class="px-4 py-3">{{$maquina->id}}</td>
                                                <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})" class="px-4 py-3">{{$maquina->equipamento}}</td>
                                                <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})" class="px-4 py-3">{{$maquina->dtAquisicao}}</td>
                                                <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})" class="px-4 py-3">
                                                    <span class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-400">{{$maquina->preco}}€</span>
                                                </td>
                                                
                                                <td class="px-4 py-3 text-center">
                                                    <x-dropdown-table>
                                                        <x-slot name="trigger">
                                                            <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <x-dropdown-link-table wire:click="mudar({{$maquina->id}})">
                                                                Alterar
                                                            </x-dropdown-link>
                                                            <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'modals.confirmacao-delete', arguments: {maquina:{{$maquina->id}}}})">
                                                                Excluir
                                                            </x-dropdown-link>
                                                            <x-dropdown-link-table wire:click='add({{$maquina->id}})'>
                                                                + Problema
                                                            </x-dropdown-link>
                                                        </x-slot>
                                                    </x-dropdown-table>
                                                </td>
                                            </tr>
                                            @empty
                                                <td colspan="3">Ainda sem maquinas!</td>
                                            @endforelse
                                        </tbody>
                                </table>
                            </div>
                        </div>


                        
                    @else
                        <header class="flex justify-between pb-4">
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Adicionar um Equipamento') }}
                            </h2>
                        </header>

                        <form wire:submit='Salvar'>
                                <div class="pb-5">
                                <x-input-label for="equipamento" :value="__('Nome do Equipamento')" />
                                <x-text-input wire:model='equipamento' id="equipamento" name="equipamento" type="text" class="block w-full mt-1" :value="old('equipamento')" />
                                <x-input-error class="mt-2" :messages="$errors->get('equipamento')" />
                            </div>
                            <div class="pb-5">
                                <x-input-label for="dtAquisicao" :value="__('Data de Aquisição')" />
                                <x-text-input wire:model='dtAquisicao' id="dtAquisicao" name="dtAquisicao" type="date" class="block w-full mt-1" :value="old('dtAquisicao')" />
                                <x-input-error class="mt-2" :messages="$errors->get('dtAquisicao')" />
                            </div>
                            <div class="pb-5">
                                <x-input-label for="preco" :value="__('Preço')" />
                                <x-text-input wire:model='preco' id="preco" name="preco" type="text" class="block w-full mt-1" :value="old('preco')" />
                                <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                            </div>
                            
                            <div><x-primary-button>Salvar</x-primary-button>
                        </form>

                        <x-secondary-button wire:click="cancelarC">{{ __('Cancelar') }}</x-secondary-button></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($alterar)
    <div class="py-2 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Altere as Informações do Equipamento') }}
                        </h2>
                    </header>
                                
                    <h3 class="pt-3">Selecione o que deseja alterar</h3>
                    <div class="pb-5">
                        <select wire:model="tipo" id="tipo" name="tipo" wire:change="$dispatch('tipo::changed')"
                            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{__('Selecione uma Opção')}}</option>
                            <option value="Equipamento">{{ __('Alterar Equipamento') }}</option>
                            <option value="Problema">{{ __('Alterar Problema') }}</option>
                        </select>
                    </div>

                    <hr style="border:1px solid red" class="mb-3">
                    
                    @if ($tipo == "Equipamento")
                        <form wire:submit='guardarE'>
                            <div class="pb-5">
                                <x-input-label for="dtAquisicao" :value="__('Data de Aquisição')" />
                                <x-text-input wire:model='dtAquisicao' id="dtAquisicao" name="dtAquisicao" type="date" class="block w-full mt-1" :value="old('dtAquisicao')" />
                                <x-input-error class="mt-2" :messages="$errors->get('dtAquisicao')" />
                            </div>
                            <div class="pb-5">
                                <x-input-label for="preco" :value="__('Preço de Compra')" />
                                <x-text-input wire:model='preco' id="preco" name="preco" type="text" class="block w-full mt-1" :value="old('preco')" />
                                <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                            </div>
                            <div class="pb-5">
                                <x-input-label for="equipamento" :value="__('Nome do Equipamento')" />
                                <x-text-input wire:model='equipamento' id="equipamento" name="equipamento" type="text" class="block w-full mt-1" :value="old('equipamento')" />
                                <x-input-error class="mt-2" :messages="$errors->get('equipamento')" />
                            </div>
                    @elseif($tipo == "Problema")
                        @if ($altProblema == false)
                            <div class="pb-5">
                                <x-input-label for="SelProblema" :value="__('Problema no Equipamento')" />
                                <select wire:model='SelProblema' id="SelProblema" name="SelProblema"
                                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:change="$dispatch('SelProblema::changed')">   
                                        <option selected> {{__('Selecione uma Opção')}}</option>         
                                    @foreach ($mID->problemas as $problema)
                                        <option value="{{$problema->id}}">{{$problema->problema}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                        <form wire:submit='guardarP'>
                            <x-input-label for="problema" :value="__('Problema do Equipamento')"/>
                            <div class="flex pb-5">
                                <x-text-input wire:model='problema' id="problema" name="problema" type="text" class="block w-full mt-1 w-7/8" :value="old('problema')" />
                                <x-input-error class="mt-2" :messages="$errors->get('problema')" /> 

                                <x-secondary-button class="w-1/8" wire:click='retroceder'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/></svg>
                                </x-secondary-button>                                
                            </div>
                            <div class="pb-5">
                                <x-input-label for="estado" :value="__('Estado do Problema')" />
                                <select wire:model='estado' id="estado" name="estado"
                                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">        
                                        @if ($Tempproblema->estado == "Por Resolver")
                                            <option selected value="Por Resolver">Por Resolver</option>
                                            <option value="Em Progresso">Em Progresso</option>
                                            <option value="Resolvido">Resolvido</option>
                                        @elseif ($Tempproblema->estado == "Em Progresso")
                                            <option value="Por Resolver">Por Resolver</option>
                                            <option selected value="Em Progresso">Em Progresso</option>
                                            <option value="Resolvido">Resolvido</option>
                                        @else
                                            <option value="Por Resolver">Por Resolver</option>
                                            <option value="Em Progresso">Em Progresso</option>
                                            <option selected value="Resolvido">Resolvido</option>
                                        @endif
                                </select>
                            </div>
                        @endif
                    @endif
                    @if ($tipo == "Problema" || $tipo == "Equipamento")
                        <div><x-primary-button type="submit">{{ __('Associar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>
                    @else
                        <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($addP)
        <div class="py-2 ">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Adicionar um Problema') }}
                            </h2>
                        </header>
                        <form wire:submit='salvarP'>
                            <div class="pb-5">
                                <x-input-label for="problema" :value="__('Descrição do Problema')" />
                                <x-text-input wire:model='problema' id="problema" name="problema" type="text" class="block w-full mt-1" :value="old('problema')" />
                                <x-input-error class="mt-2" :messages="$errors->get('problema')" />
                            </div>
                            <div>
                                <x-input-label for="estado" :value="__('Estado do Problema')" />
                                <select wire:model='estado' id="estado" name="estado" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">  
                                    <option selected>{{__('Selecione uma Opção')}}</option> 
                                    <option value="Por Resolver">Por Resolver</option>
                                    <option value="Em Progresso">Em Progresso</option>
                                    <option value="Resolvido">Resolvido</option>
                                </select>
                            </div>

                            <div class="pt-3"><x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
                        </form>
                        <x-secondary-button wire:click="cancelarP">{{ __('Cancelar') }}</x-secondary-button>
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>                

