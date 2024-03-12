<div>
    <x-slot name="pageTitle">
        Customizar a Parte Publica
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex">
                    <div class="w-1/4 me-5">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Primeira Imagem da Pagina
                            Principal</label>
                        @if (!$alt1)
                            @if ($hero1)
                            <img src="{{Storage::url($hero1->imagem)}}">
                            <x-secondary-button wire:click='alterar1' class="mt-2">Alterar</x-secondary-button>
                            @else
                            <form wire:submit="guardar('hero1')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto1 && getimagesize($foto1->getRealPath()))

                                        @if(in_array($foto1->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto1->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto1" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto1" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto1')" />
                                </div>

                                @if ($foto1 && in_array($foto1->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                            </form>
                            @endif
                        @else
                            <form wire:submit="alterar('hero1')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto1 && getimagesize($foto1->getRealPath()))

                                        @if(in_array($foto1->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto1->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto1" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto1" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto1')" />
                                </div>

                                @if ($foto1 && in_array($foto1->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                                <div class="flex">
                                <x-primary-button>Salvar</x-primary-button>
                            </form>
                            <x-secondary-button wire:click='cancelar' class="ms-2">Cancelar</x-secondary-button>
                        </div>
                        @endif
                    </div>

                    <div class="w-1/4 me-5">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Segunda Imagem da Pagina
                            Principal</label>
                        @if (!$alt2)
                            @if ($hero2)
                            <img src="{{Storage::url($hero2->imagem)}}">
                            <x-secondary-button wire:click='alterar2' class="mt-2">Alterar</x-secondary-button>
                            @else
                            <form wire:submit="guardar('hero2')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto2 && getimagesize($foto2->getRealPath()))

                                        @if(in_array($foto2->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto2->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto2" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto2" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto2')" />
                                </div>

                                @if ($foto2 && in_array($foto2->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                            </form>
                            @endif
                        @else
                            <form wire:submit="alterar('hero2')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto2 && getimagesize($foto2->getRealPath()))

                                        @if(in_array($foto2->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto2->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto2" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto2" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto2')" />
                                </div>

                                @if ($foto2 && in_array($foto2->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                                <div class="flex">
                                <x-primary-button>Salvar</x-primary-button>
                            </form>
                            <x-secondary-button wire:click='cancelar' class="ms-2">Cancelar</x-secondary-button>
                        </div>
                        @endif
                    </div>

                    <div class="w-1/4 me-5">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Terceira Imagem da Pagina
                            Principal</label>
                        @if (!$alt3)
                            @if ($hero3)
                            <img src="{{Storage::url($hero3->imagem)}}">
                            <x-secondary-button wire:click='alterar3' class="mt-2">Alterar</x-secondary-button>
                            @else
                            <form wire:submit="guardar('hero3')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto3 && getimagesize($foto3->getRealPath()))

                                        @if(in_array($foto3->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto3->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto3" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto3" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto3')" />
                                </div>

                                @if ($foto3 && in_array($foto3->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                            </form>
                            @endif
                        @else
                            <form wire:submit="alterar('hero3')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto3 && getimagesize($foto3->getRealPath()))

                                        @if(in_array($foto3->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto3->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto3" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto3" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto3')" />
                                </div>

                                @if ($foto3 && in_array($foto3->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                                <div class="flex">
                                <x-primary-button>Salvar</x-primary-button>
                            </form>
                            <x-secondary-button wire:click='cancelar' class="ms-2">Cancelar</x-secondary-button>
                        </div>
                        @endif
                    </div>
                    
                    <div class="w-1/4 me-5">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Imagem de capa do video</label>
                        @if (!$alt4)
                            @if ($videoImg)
                            <img src="{{Storage::url($videoImg->imagem)}}">
                            <x-secondary-button wire:click='alterar4' class="mt-2">Alterar</x-secondary-button>
                            @else
                            <form wire:submit="guardar('videoImg')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto4 && getimagesize($foto4->getRealPath()))

                                        @if(in_array($foto4->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto4->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto4" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto4" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto4')" />
                                </div>

                                @if ($foto4 && in_array($foto4->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                            </form>
                            @endif
                        @else
                            <form wire:submit="alterar('videoImg')">
                                <div class="grid grid-cols-1 space-y-2">
                                    <div class="items-center justify-center">
                                        @if ($foto4 && getimagesize($foto4->getRealPath()))

                                        @if(in_array($foto4->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="rounded-md h-13" src="{{ $foto4->temporaryUrl() }}">
                                        @else
                                        <div class="flex items-center justify-center">
                                            <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center h-5 text-center">
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue
                                                            as imagens até aqui</span><br /> ou <a
                                                            class="text-blue-600 hover:underline">clique aqui</a> para
                                                        escolher uma imagem</p>
                                                </div>
                                                <input wire:model="foto4" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                        @endif

                                        @else
                                        <label class="flex flex-col p-10 text-center border-4 rounded-lg h-30 group">

                                            <div class="flex flex-col items-center justify-center h-5 text-center">
                                                <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as
                                                        imagens até aqui</span><br /> ou <a
                                                        class="text-blue-600 hover:underline">clique aqui</a> para escolher
                                                    uma imagem</p>
                                            </div>

                                            <input wire:model="foto4" type="file" name="file" class="hidden">
                                        </label>
                                        @endif
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('foto4')" />
                                </div>

                                @if ($foto4 && in_array($foto4->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif',
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
                                <div class="flex">
                                <x-primary-button>Salvar</x-primary-button>
                            </form>
                            <x-secondary-button wire:click='cancelar' class="ms-2">Cancelar</x-secondary-button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="py-12 w-1/3">
            <div class="mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <livewire:imagens.add>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12 w-2/3">
            <div class="mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <livewire:noticias.add>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <livewire:imagens.ver>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <livewire:noticias.ver>
                    </div>
                </div>
            </div>
        </div>
</div>