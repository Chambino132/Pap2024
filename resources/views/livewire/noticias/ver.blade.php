<div>
    <div>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Lista de Noticias') }}
            
        </h2>
        <hr class="w-40 border-black dark:border-white">
        @if (!$isEditing)
        <div>
            <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                <option value="10">10 Linhas</option>
                <option value="25">25 Linhas</option>
                <option value="50">50 Linhas</option>
            </select>
            <select wire:model.live='arquivado' class='ms-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40' wire:change="$dispatch('pagination::updated')">
                <option value="todos">Todos</option>
                <option value="arquivados">Arquivados</option>
                <option value="nao arquivados">Não Arquivados</option>
            </select>
        </div>
        
        <hr style="border:1px solid red" class="mb-4 mt-4" >
        
        <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg">    
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th wire:click='ordenar("titulo")' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Titulo
                                @if ($ordena == 'titulo')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg>
                                @endif
                            </th>
                            <th class="px-4 py-3 text-left">Imagem</th>
                            <th wire:click='ordenar("descricao")' class="px-4 py-3 text-left flex dark:hover:bg-red-900 hover:bg-red-700">Descrição 
                                @if ($ordena == 'descricao')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg>
                                @endif
                            </th>
                            <th class="px-4 py-3 text-left">Arquivado</th>
                            <th class="w-1/12 px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
                        @forelse ($noticias as $noticia)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                            <td class="px-4 py-3">
                                {{$noticia->titulo}}
                            </td>
                           <td class="px-4 py-3"><img class="h-20" src="{{Storage::url($noticia->imagem)}}"></td>
                           <td class="px-4 py-3">{{$noticia->descricao}}</td>
                           <td class="px-4 py-3">
                            @if ($noticia->arquivado)
                                Não
                            @else
                                Sim 
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
                                        <x-dropdown-link-table wire:click='arquivar({{$noticia->id}})'>
                                        @if (!$noticia->arquivado)
                                            Desarquivar
                                        @else
                                            Arquivar
                                        @endif
                                    </x-dropdown-link-table>
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
        <div class="my-2">
            {{$noticias->links(data: ['scrollTo' => false])}}
        </div>
        @else
        <form wire:submit="guardar">
            
                <div class="pb-5 mt-2">
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
                            <x-input-label>
                                <span>Use apenas ficheiros jpeg. png. jpg. etc.</span>
                            </x-input-label>
                            <img src="{{Storage::url($noticia->imagem)}}" class="w-56">
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
                        <x-input-label>
                            <span>Use apenas ficheiros jpeg. png. jpg. etc.</span>
                        </x-input-label>
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
        
                
        
                
            <div class="flex">
                <x-primary-button class="me-3">Salvar</x-primary-button>
         
            </form>
            <x-secondary-button wire:click='cancelar'>Cancelar</x-secondary-button>
        </div>
        @endif
    </div>
</div>

