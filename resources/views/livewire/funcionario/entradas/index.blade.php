<div class="py-12 ">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <header class="flex justify-between">
                    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Entradas') }}
                    </h2>
                </header>
                
                <div>
                    <x-text-input wire:model.live='search' class="w-1/2 my-2" placeholder="Pesquisa"></x-text-input>
                    <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                        <option value="10">10 Linhas</option>
                        <option value="25">25 Linhas</option>
                        <option value="50">50 Linhas</option>
                    </select>
                </div>
                
                <hr style="border:1px solid red" class="mb-4">
                
                <div class="flex ">
                    <h6 class="py-2 mx-2 font-medium text-gray-900 dark:text-gray-100">Ver entradas de</h6>
                    <x-text-input wire:model.live="firstDate" type="datetime-local" class="px-2"></x-text-input>
                    <h6 class="py-2 mx-2 font-medium text-gray-900 dark:text-gray-100">a</h6>
                    <x-text-input wire:loading.remove wire:model.live='lastDate' type="datetime-local" class="px-2"></x-text-input>
                </div>
                <div class="py-8 ">

                    <div class="bg-white rounded-lg shadow-lg dark:bg-gray-300">
                        <table class="w-full table-auto">
                            <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">

                                <tr>
                                    <th class="px-4 py-3 text-left">Cliente</th>
                                    <th class="px-4 py-3 text-left">Data e Hora</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-slate-900">
                                @forelse ($entradas as $entrada)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-3">
                                            {{$entrada->cliente->user->name}}
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-400">{{$entrada->entrada}}</span>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="px-4 py-3" colspan="3">Sem Entradas</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        
                    </div>
                    <div class="my-2 text-gray-900 dark:text-gray-100">
                        {{ $entradas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
