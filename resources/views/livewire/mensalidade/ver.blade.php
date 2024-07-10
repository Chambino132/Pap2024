<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (!$isEditing && !$isCreating)
                <div class="flex justify-between">
                    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Lista de Mensalidades') }}
                        <hr class="border-black dark:border-white" style="width: 205px">
                    </h2>          
                    <div class="flex">
                        <x-secondary-button wire:click='exportar' class="pt-2.5 pb-3 mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                            </svg>
                        </x-secondary-button>
                        <x-secondary-button wire:click='exportarPDF' class="pt-2.5 pb-3 mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
                            </svg>
                        </x-secondary-button>

                        <button wire:click='novo' class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Adicionar
                        </button>
                    </div>
                </div>
                <div class="py-8 ">

                    <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg {{$class}}">
                        <table class="w-full table-auto">
                                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                
                                    <tr>
                                        <th class="px-4 py-3 text-left">Dias</th>
                                        <th class="px-4 py-3 text-left">Preço</th>
                                        <th class="px-4 py-3 text-left">Clientes</th>
                
                                        <th class="w-1/12 px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-900 dark:text-slate-900">
                                    @forelse ($mensalidades as $mensalidade)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                        <td class="px-4 py-3">{{$mensalidade->dias}}</td>
                                        <td class="flex px-4 py-3">
                
                                            <span class="px-4 py-2 text-gray-600 bg-yellow-200 rounded-lg dark:text-gray-800 dark:bg-yellow-300">{{$mensalidade->preco}}€</span>
                                        </td>
                                        <td class="px-4 py-3">{{$mensalidade->clientes()->count()}}</td>
                                        <td class="px-4 py-3 text-center">
                                            <x-dropdown-table>
                                                <x-slot name="trigger">
                                                    <button wire:click='changeClass' class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
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
