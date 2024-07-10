<div class="">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if ($add == false && $filed == false)
                    <div class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Notas de Funcionarios') }} 
                        </h2>
                        <div>
                            <x-secondary-button wire:click='arquivo'>Arquivados</x-secondary-button>
                            @if (Auth::user()->utype == 'Funcionario')   
                                <button wire:click="adicionar" class='inline-flex items-center self-center px-5 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3'>Adicionar</button>
                                @endif
                        </div>
                    </div>
                    <hr class="border-black w-36 dark:border-white">
                
                
                    <div class="grid grid-cols-2">
                        @foreach ($notas as $nota)
                            @if ($nota->arquivado == false)
                                <div class="flex py-4 pl-3 my-4 mr-2 border-2 dark:bg-gray-800 sm:rounded-lg">
                                    <div class="w-3/4 py-8 text-center border-r-2">
                                        <strong>Titulo: {{$nota->titulo}}</strong>
                                        <div class="py-2">
                                            <i>"{{$nota->descricao}}"</i>
                                        </div>
                                        Autor: {{$nota->funcionario->user->name}}
                                    </div>
                                    @if (Auth::user()->id == $nota->funcionario->user_id)
                                        <div class="content-center w-1/4 text-center">
                                            <x-secondary-button wire:click='arquivar({{$nota->id}})' class="justify-center w-24">Arquivar</x-secondary-button>
                                            <x-danger-button wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deletenota', arguments: {notaID:{{$nota->id}}}})" class="justify-center w-24 mt-3">Excluir</x-danger-button>
                                        </div>
                                    @else
                                        <div class="content-center ml-4">
                                            <x-secondary-button wire:click='arquivar({{$nota->id}})'>Arquivar</x-secondary-button>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @elseif ($add == true && $filed == false)
                    <div class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Adicionar Nota') }} 
                        </h2>
                    </div>
                    <hr class="border-black w-36 dark:border-white">
                    
                    <form wire:submit='salvar' class="pt-5">
                        <div class="pb-5">
                            <x-input-label for="titulo" :value="__('titulo')" />
                            <x-text-input  wire:model='titulo' id="titulo" name="titulo" type="text" class="block w-full mt-1" :value="$titulo" />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="descricao" :value="__('descricao')" />
                            <x-text-input  wire:model='descricao' id="descricao" name="descricao" type="text" class="block w-full mt-1" :value="$descricao" />
                            <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                        </div>
                        <div class="flex">
                            <x-primary-button>Adicionar</x-primary-button>
                    </form>
                            <x-secondary-button wire:click='cancel'>Cancelar</x-secondary-button>
                        </div>
                @elseif ($filed == true)
                    <div class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Notas Arquivadas') }} 
                        </h2>
                        
                        <x-secondary-button wire:click='desarquivado'>Voltar</x-secondary-button>
                    </div>
                    <hr class="border-black w-36 dark:border-white">
                    
                    <div class="grid grid-cols-2">
                        @foreach ($notas as $nota)
                            @if ($nota->arquivado == true)
                                <div class="flex py-4 pl-3 my-4 mr-2 border-2 dark:bg-gray-800 sm:rounded-lg">
                                    <div class="w-3/4 py-8 text-center border-r-2">
                                        <strong>Titulo: {{$nota->titulo}}</strong>
                                        <div class="py-2">
                                            <i>"{{$nota->descricao}}"</i>
                                        </div>
                                        Autor: {{$nota->funcionario->user->name}}
                                    </div>
                                    @if (Auth::user()->id == $nota->funcionario->user_id)
                                        <div class="content-center w-1/4 text-center">
                                            <x-secondary-button wire:click='desarquivar({{$nota->id}})' class="justify-center w-28">Desarquivar</x-secondary-button>
                                            <x-danger-button wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deletenota', arguments: {notaID:{{$nota->id}}}})" class="justify-center mt-3 w-28">Excluir</x-danger-button>
                                        </div>
                                    @else
                                        <div class="content-center ml-4">
                                            <x-secondary-button class="justify-center w-28" wire:click='desarquivar({{$nota->id}})'>Desarquivar</x-secondary-button>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
