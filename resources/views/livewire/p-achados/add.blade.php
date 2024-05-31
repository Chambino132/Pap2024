<div>
    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">Criar Anuncio de Perdidos e Achados</h2>
    <hr class="border-black dark:border-white" style="width: 340px">

    <form wire:submit="guardar">
        <div class="px-4 py-2">
            <div class="pb-5">
                <x-input-label :value="__('Item')" />
                <x-text-input wire:model.live='item' class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('item')" />
            </div>

            <div class="pb-5">
                <x-input-label :value="__('Local onde foi encontrado')" />
                <x-text-input wire:model.live='localizacao' class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('local')" />
            </div>


            <div class="grid grid-cols-1 space-y-2">
                <div class="items-center justify-center">
                    @if ($foto && getimagesize($foto->getRealPath()))

                        @if (in_array($foto->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                            <img class="rounded-md h-13" src="{{ $foto->temporaryUrl() }}">
                        @else
                            <div class="flex items-center justify-center">
                                <label
                                    class="flex flex-col p-10 text-center border-4 border-double rounded-lg h-30 group">
                                    <div class="flex flex-col items-center justify-center h-5 text-center">
                                        <p class="text-gray-500 pointer-none "><span class=""><a
                                                    class="text-blue-600 hover:underline">Clique
                                                    aqui</a> para
                                                escolher uma imagem</p>
                                    </div>
                                    <input wire:model="foto" type="file" name="file" class="hidden">
                                </label>
                                <x-input-label>
                                    <span>Apenas são aceites ficheiros jpeg. png. jpg. etc.</span>
                                </x-input-label>
                            </div>
                            <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                        @endif
                    @else
                        <label class="flex flex-col p-10 text-center border-4 border-double rounded-lg h-30 group">

                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                <p class="text-gray-500 pointer-none "><span class=""><a
                                            class="text-blue-600 hover:underline">Clique
                                            aqui</a> para escolher
                                        uma imagem</p>
                            </div>

                            <input wire:model="foto" type="file" name="file" class="hidden">
                        </label>
                        <x-input-label>
                            <span>Apenas são aceites ficheiros jpeg. png. jpg. etc.</span>
                        </x-input-label>
                    @endif
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('foto')" />
            </div>

            @if ($foto && in_array($foto->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif', 'webp']))
                <x-input-label>
                    <div calss="flex">
                        <x-secondary-button wire:click="rmvimg" class="justify-center mt-3">Remover imagem
                        </x-secondary-button>
                    </div>
                </x-input-label>
            @endif

            <x-primary-button class="mt-6">Salvar</x-primary-button>
        </div>
    </form>
</div>
