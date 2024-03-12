<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (!$isEditing && !$isCreating)
                <div class="flex justify-between">
                    <header>
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Mensalidades') }}
                        </h2>
                    </header>
                    <button wire:click='novo' class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Adicionar
                    </button>
                </div>
                <div class="py-8 ">

                    <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                        <table class="w-full table-auto">
                                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                
                                    <tr>
                                        <th class="px-4 py-3 text-left">#</th>
                                        <th class="px-4 py-3 text-left">Dias</th>
                                        <th class="px-4 py-3 text-left">Preço</th>
                                        <th class="px-4 py-3 text-left">Clientes</th>
                
                                        <th class="w-1/12 px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-900 dark:text-slate-900">
                                    @forelse ($mensalidades as $mensalidade)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-3">
                                            {{$mensalidade->id}}
                                        </td>
                                        <td class="px-4 py-3">{{$mensalidade->dias}}x Por Semana</td>
                                        <td class="px-4 py-3">
                
                                            <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-yellow-200 dark:bg-yellow-300 rounded-lg">{{$mensalidade->preco}}€</span>
                                        </td>
                                        <td class="px-4 py-3">{{$mensalidade->clientes()->count()}}</td>
                                        <td class="px-4 py-3 text-center">
                                            <x-dropdown-table>
                                                <x-slot name="trigger">
                                                    <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link-table wire:click='edit({{$mensalidade->id}})'>
                                                        Alterar
                                                    </x-dropdown-link-table>
                                                    <x-dropdown-link-table wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deletemens', arguments: {mensalidade: {{$mensalidade->id}}}})">
                                                        Excluir
                                                    </x-dropdown-link-table>
                                                </x-slot>
                                            </x-dropdown-table>
                                            
                
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="px-4 py-3">
                                                Ainda Sem Mensalidades!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>
                @elseif($isEditing && !$isCreating)
                <header>
                    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Alterar Mensalidade') }}
                    </h2>
                </header>
                <div class="px-8 py-5 ">
                    <form wire:submit='alterar'>
                        <div class="pb-5">
                            <x-input-label for="dias" :value="__('Dias')" />
                            <x-text-input  wire:model='dias' id="dias" name="dias" type="text" class="block w-full mt-1" :value="$dias" />
                            <x-input-error class="mt-2" :messages="$errors->get('dias')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="preco" :value="__('Preço')" />
                            <x-text-input  wire:model='preco' id="preco" name="preco" type="text" class="block w-full mt-1" :value="$preco" />
                            <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                        </div>
                        <div class="flex">
                        <x-primary-button >Salvar</x-primary-button>
                    </form>
                    <x-secondary-button wire:click='cancelar' class="ms-2">Cancelar</x-secondary-button>
                </div>
                </div>
                @elseif (!$isEditing && $isCreating)
                <header>
                    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Criar Mensalidade') }}
                    </h2>
                    <form wire:submit='guardar'>
                        <div class="pb-5">
                            <x-input-label for="dias" :value="__('Dias')" />
                            <x-text-input  wire:model='dias' id="dias" name="dias" type="text" class="block w-full mt-1" :value="$dias" />
                            <x-input-error class="mt-2" :messages="$errors->get('dias')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="preco" :value="__('Preço')" />
                            <x-text-input  wire:model='preco' id="preco" name="preco" type="text" class="block w-full mt-1" :value="$preco" />
                            <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                        </div>
                        <div class="flex">
                        <x-primary-button >Salvar</x-primary-button>
                    </form>
                    <x-secondary-button wire:click='cancelar' class="ms-2">Cancelar</x-secondary-button>
                </div>
                </header>
                @endif
            </div>
        </div>
    </div>
</div>
