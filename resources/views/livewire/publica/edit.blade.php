<div>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-medium text-gray-800 dark:text-gray-100">Secção Hero</h2>
                    <hr class="w-28 border-black dark:border-white mb-12">

                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Hero 1</h2>
                    <hr class="w-12 border-black dark:border-white mb-5">
                    <form wire:submit="Guardar('1')">
                        <div class="pb-5">
                            <x-input-label for="nome" :value="__('Titulo')" />
                            <x-text-input wire:model='titulo1' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label for="nome" :value="__('SubTitulo')" />
                            <x-text-input wire:model='subtitulo1' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('subtitulo')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>

                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Hero 2</h2>
                    <hr class="w-12 border-black dark:border-white mb-5">
                    <form wire:submit="Guardar('2')">
                        <div class="pb-5">
                            <x-input-label for="nome" :value="__('Titulo')" />
                            <x-text-input wire:model='titulo2' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label for="nome" :value="__('SubTitulo')" />
                            <x-text-input wire:model='subtitulo2' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('subtitulo')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>

                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Hero 3</h2>
                    <hr class="w-12 border-black dark:border-white mb-5">
                    <form wire:submit="Guardar('3')">
                        <div class="pb-5">
                            <x-input-label for="nome" :value="__('Titulo')" />
                            <x-text-input wire:model='titulo3' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label for="nome" :value="__('SubTitulo')" />
                            <x-text-input wire:model='subtitulo3' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('subtitulo')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-medium text-gray-800 dark:text-gray-100">Secção Sobre</h2>
                    <hr class="w-32 border-black dark:border-white mb-12">

                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Sobre 1</h2>
                    <hr class="w-16 border-black dark:border-white mb-5">
                    <form wire:submit="GuardarSobre('1')">
                        <div class="pb-5">
                            <x-input-label :value="__('Titulo')" />
                            <x-text-input wire:model='tituloSo1' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('tituloSo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label :value="__('Texto')" />
                            <x-text-input wire:model='text1' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>
                    
                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Sobre 2</h2>
                    <hr class="w-16 border-black dark:border-white mb-5">
                    <form wire:submit="GuardarSobre('2')">
                        <div class="pb-5">
                            <x-input-label :value="__('Titulo')" />
                            <x-text-input wire:model='tituloSo2' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('tituloSo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label :value="__('Texto')" />
                            <x-text-input wire:model='text2' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>

                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Sobre 3</h2>
                    <hr class="w-16 border-black dark:border-white mb-5">
                    <form wire:submit="GuardarSobre('3')">
                        <div class="pb-5">
                            <x-input-label :value="__('Titulo')" />
                            <x-text-input wire:model='tituloSo3' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('tituloSo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label :value="__('Texto')" />
                            <x-text-input wire:model='text3' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>

                    <h2 class="text-md font-medium text-gray-800 dark:text-gray-100">Sobre 4</h2>
                    <hr class="w-16 border-black dark:border-white mb-5">
                    <form wire:submit="GuardarSobre('4')">
                        <div class="pb-5">
                            <x-input-label :value="__('Titulo')" />
                            <x-text-input wire:model='tituloSo4' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('tituloSo')" />                                
                        </div>
                        <div class="pb-5">
                            <x-input-label :value="__('Texto')" />
                            <x-text-input wire:model='text4' type="text" class="block w-full mt-1" :value="old('titulo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />                                
                        </div>
                        <x-primary-button class="mb-5">Guardar</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
