    <div>
        
    <div class="py-8 ">
        
        @if (!$alt)
        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-400">
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">Telefone</th>
                            <th class="px-4 py-3 text-left">Morada</th>
                            <th class="px-4 py-3 text-left">Cargo</th>
                            <th class="px-4 py-3 text-left">Foto</th>
    
                            <th class="w-1/12 px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                            <td class="px-4 py-3">
                                {{$funcionario->telefone}}
                            </td>
                            <td class="px-4 py-3">{{$funcionario->morada}}</td>
                            <td class="px-4 py-3">{{$funcionario->cargo}}</td>
                            <td wire:click="$dispatch('openModal', {component: 'modals.show-image', arguments: {funcionario:{{$funcionario->id}}}})" class="px-4 py-3"><img class="w-32 " src="{{Storage::url($funcionario->foto)}}"></td>
                            
                            <td class="px-4 py-3 text-center">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" wire:click='alterar'>alterar</button>
                            </td>
                        </tr>
                        
                    </tbody>
            </table>
            
        </div>
        @else
            <form wire:submit='guardar'>
                <div class="px-3 mb-5">
                    <x-input-label for="telefone" :value="__('Telefone')" />
                    <x-text-input wire:model="telefone" class="block w-full mt-1" />
                    <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                </div>
                <div class="px-3 mb-5">
                    <x-input-label for="morada" :value="__('Morada')" />
                    <x-text-input wire:model="morada" class="block w-full mt-1" />
                    <x-input-error class="mt-2" :messages="$errors->get('morada')" />
                </div>
                <div class="grid grid-cols-1 px-3 mb-5 space-y-2">
                    <x-input-label :value="__('Nova Foto')"/>
                    <div class="items-center justify-center w-full ">
                        @if ($imagem && getimagesize($imagem->getRealPath()))
        
                            @if(in_array($imagem->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                <img class="w-full rounded-md h-13" src="{{ $imagem->temporaryUrl() }}">
                            @else
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col w-full p-10 text-center border-4 rounded-lg h-30 group">
                                        <div class="flex flex-col items-center justify-center w-full h-5 text-center">
                                            {{-- Falta corrigir o drag --}}
                                            <p class="text-gray-500 pointer-none "><span class="">Arraste e largue a imagem até aqui</span><br/> ou <a class="text-blue-600 hover:underline">clique aqui</a> para escolher uma nova imagem</p>
                                        </div>
                                        <input wire:model="imagem" type="file" name="file" class="hidden">
                                    </label>
                                </div>
                                <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                <x-input-label :value="__('Foto Atual')"/>
                                <img src="{{Storage::url($funcionario->foto)}}">
                            @endif
                        
                        @else    
                            <label class="flex flex-col w-full p-10 text-center border-4 rounded-lg h-30 group">
        
                                <div class="flex flex-col items-center justify-center w-full h-5 text-center">
                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue a imagem até aqui</span><br/> ou <a class="text-blue-600 hover:underline">clique aqui</a> para escolher uma nova imagem</p>
                                </div>
                                    
                                <input wire:model="imagem" type="file" name="file" class="hidden">
                            </label>
                            <x-input-label :value="__('Foto Atual')"/>
                            <img src="{{Storage::url($funcionario->foto)}}">
                        @endif
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
                </div>
        
                @if ($imagem && in_array($imagem->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif', 'webp']))
                    <x-input-label>
                        <div calss="flex">
                            <x-secondary-button wire:click="rmvimg" class="justify-center w-full mt-3">Remover imagem</x-secondary-button>
                        </div>
                    </x-input-label>
                @endif
        
                <x-input-label>
                    <span>Use apenas ficheiros jpeg. png. jpg. etc.</span>
                </x-input-label>

                <div class="flex">
                <x-primary-button>Guardar</x-primary-button>
            </form>
            <x-secondary-button wire:click='cancelar'>Cancelar</x-secondary-button>
        </div>
        @endif
    </div>
</div>