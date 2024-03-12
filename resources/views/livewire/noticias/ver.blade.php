<div>
    <div>
        <h2 class="ms-2 text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Noticias') }}
            
        </h2>
        <hr class="w-1/12 mb-5">
        @if (!$isEditing)
            
        
        <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">    
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">Titulo</th>
                            <th class="px-4 py-3 text-left">Imagem</th>
                            <th class="px-4 py-3 text-left">Descrição</th>
                            <th class="px-4 py-3 text-left">Arquivado</th>
                            <th class="w-1/12 px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
    
                        <tr class="hover:bg-gray-100">
                            @forelse ($noticias as $noticia)
                            <td class="px-4 py-3">
                                {{$noticia->titulo}}
                            </td>
                           <td class="px-4 py-3"><img class="h-20" src="{{Storage::url($noticia->imagem)}}"></td>
                           <td class="px-4 py-3">{{$noticia->descricao}}</td>
                           <td class="px-4 py-3">
                            @if ($noticia->arquivado)
                                Sim
                            @else
                                Não
                            @endif
                        </td>
                            <td class="px-4 py-3 text-center">
                                <x-dropdown-table>
                                    <x-slot name="trigger">
                                        <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link-table wire:click='editar({{$noticia->id}})'>
                                            Editar
                                        </x-dropdown-link-table>
                                        @if ($noticia->arquivado)
                                        <x-dropdown-link-table wire:click='desarquivar({{$noticia->id}})'>
                                            Desarquivar
                                        </x-dropdown-link-table>
                                        @else
                                        <x-dropdown-link-table wire:click='arquivar({{$noticia->id}})'>
                                            Arquivar
                                        </x-dropdown-link-table>
                                        @endif
                                    </x-slot>
                                </x-dropdown-table>
                                
    
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-3" colspan="3">Ainda sem imagens</td>
                            </tr>    
                        @endforelse
                    </tbody>
            </table>
        </div>
        @else
        <form wire:submit="guardar">
            <div class="px-4 py-2">
                <div class="pb-5">
                    <x-input-label for="titulo" :value="__('Titulo')" />
                    <x-text-input  wire:model.live='titulo' class="block w-full mt-1"/>
                    <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                </div>
        
                <div class="pb-5">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <x-text-input  wire:model.live='descricao' class="block w-full mt-1"/>
                    <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                </div>
        
        
                <div class="grid grid-cols-1 space-y-2">
                    <div class="items-center justify-center">
                        @if ($foto && getimagesize($foto->getRealPath()))
        
                        @if(in_array($foto->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                        <img class="rounded-md h-13" src="{{ $foto->temporaryUrl() }}">
                        @else
                        <div class="flex items-center justify-center">
                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                            as imagens até aqui</span><br /> ou <a class="text-blue-600 hover:underline">clique
                                            aqui</a> para
                                        escolher uma imagem</p>
                                </div>
                                <input wire:model="foto" type="file" name="file" class="hidden">
                            </label>
                        </div>
                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                        @endif
        
                        @else
                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
        
                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                        imagens até aqui</span><br /> ou <a class="text-blue-600 hover:underline">clique
                                        aqui</a> para escolher
                                    uma imagem</p>
                            </div>
        
                            <input wire:model="foto" type="file" name="file" class="hidden">
                        </label>
                        <img src="{{Storage::url($noticia->imagem)}}" class="w-56">
                        @endif
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                </div>
        
                @if ($foto && in_array($foto->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
                'webp']))
                <x-input-label>
                    <div calss="flex">
                        <x-secondary-button wire:click="rmvimg" class="justify-center mt-3">Remover imagem
                        </x-secondary-button>
                    </div>
                </x-input-label>
                @endif
        
                <x-input-label>
                    <span>Use apenas ficheiros jpeg. png. jpg. etc.</span>
                </x-input-label>
        
                
        
                <x-primary-button>Salvar</x-primary-button>
            </div>
            </form>
        @endif
    </div>
</div>

