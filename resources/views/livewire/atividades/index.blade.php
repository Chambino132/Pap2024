<div>
    <x-slot name="pageTitle">
        Mensalidades
    </x-slot>
    <div class="grid grid-cols-3">
        <div class="col-span-2 py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Atividades') }}
                        </h2>
                        <hr class="border-black dark:border-white" style="width: 173px">
                        <div>
                            <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3"
                                placeholder="Pesquisa"></x-text-input>
                            <select wire:model.live='perPage' id="perPage"
                                class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'"
                                wire:change="$dispatch('pagination::updated')">
                                <option value="10">10 Linhas</option>
                                <option value="25">25 Linhas</option>
                                <option value="50">50 Linhas</option>
                            </select>
                        </div>

                        <hr style="border:1px solid red" class="mt-4 mb-4">

                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-300">
                            <table class="w-full table-auto">
                                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">

                                    <tr>
                                        <th wire:click='ordenar'
                                            class="flex px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">
                                            Atividade
                                            @if ($ordena)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                </svg>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 text-left">Tecnicos</th>
                                        <th class="w-1/12 px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-900 dark:text-slate-900">
                                    @foreach ($atividades as $atividade)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-4 py-3">
                                                {{ $atividade->atividade }}
                                            </td>
                                            <td class="px-4 py-3">

                                                <span
                                                    class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-400">{{ $atividade->personals->count() }}</span>
                                            </td>

                                            <td class="px-4 py-3 text-center">
                                                <x-dropdown-table>
                                                    <x-slot name="trigger">
                                                        <button
                                                            class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link-table
                                                            wire:click="$dispatch('openModal', {component: 'atividades.associar-modal', arguments: {atividade: {{ $atividade->id }} }})">
                                                            Tecnicos
                                                        </x-dropdown-link-table>
                                                    </x-slot>
                                                </x-dropdown-table>


                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="my-2">
                            {{ $atividades->links(data: ['scrollTo' => false]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="col-span-1 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Criar Nova Atividade') }}
                        </h2>
                        <hr class="border-black dark:border-white" style="width: 190px">
                        <form wire:submit='Criar'>
                            <textarea wire:model='atividade' class="mt-5 text-xl rounded-md shadow-sm bord-er-gray-400 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" placeholder="Escreva aqui a Atividade" cols="30" rows="10"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('atividade')" />
                            <x-primary-button class="mt-2">Criar</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
