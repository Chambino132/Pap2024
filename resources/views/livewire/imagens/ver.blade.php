<div>
    <div>
        <h2 class="ms-2 text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Imagens') }}
            
        </h2>
        <hr class="w-1/12 mb-5">
        <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
            
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">Titulo</th>
                            <th class="px-4 py-3 text-left">Imagem</th>
                            <th class="px-4 py-3 text-left">Arquivado</th>
                            <th class="w-1/12 px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
    
                        <tr class="hover:bg-gray-100">
                            @forelse ($fotos as $foto)
                            <td class="px-4 py-3">
                                {{$foto->titulo}}
                            </td>
                           <td class="px-4 py-3"><img class="h-20" src="{{Storage::url($foto->imagem)}}"></td>
                           <td class="px-4 py-3">
                            @if ($foto->arquivado)
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
                                        @if ($foto->arquivado)
                                        <x-dropdown-link-table wire:click='desarquivar({{$foto->id}})'>
                                            Desarquivar
                                        </x-dropdown-link-table>
                                        @else
                                        <x-dropdown-link-table wire:click='arquivar({{$foto->id}})'>
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
    </div>
</div>
