<div class="py-12 ">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Lista de Entradas') }}
                    </h2>
                    <hr class="w-40 border-black dark:border-white">
                
                <div>
                    <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                    <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                        <option value="10">10 Linhas</option>
                        <option value="25">25 Linhas</option>
                        <option value="50">50 Linhas</option>
                    </select>
                    <x-secondary-button wire:click='exportar' class="pt-2.5 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                            <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                        </svg>
                    </x-secondary-button>
                    <x-secondary-button wire:click='exportarPDF' class="pt-2.5 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                            <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
                        </svg>
                    </x-secondary-button>
                </div>
                
                <hr style="border:1px solid red" class="my-4">
                
                <div class="flex ">
                    <h6 class="py-2 mx-2 font-medium text-gray-900 dark:text-gray-100">Ver entradas de</h6>
                    <x-text-input wire:model.live="firstDate" type="datetime-local" class="px-2"></x-text-input>
                    <h6 class="py-2 mx-2 font-medium text-gray-900 dark:text-gray-100">a</h6>
                    <x-text-input wire:loading.remove wire:model.live='lastDate' type="datetime-local" class="px-2"></x-text-input>
                </div>
                <div class="py-5 ">

                    <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-400">
                        <table class="w-full table-auto">
                            <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">

                                <tr>
                                    <th wire:click='ordenar("nome")' class="flex px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">Cliente 
                                        @if ($ordena == 'nome')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                      </svg>
                                    @endif</th>
                                    <th wire:click='ordenar("data")' class="px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">
                                        <div class="flex">
                                            Data e Hora 
                                            @if ($ordena == 'data')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                            </svg>
                                        
                                            @endif
                                        </div></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-slate-900">
                                @forelse ($entradas as $entrada)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                        <td class="px-4 py-3">
                                            {{$entrada->cliente->user->name}}
                                        </td>
                                        <td class="flex px-4 py-3">
                                            <span
                                                class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-500">{{$entrada->entrada}}</span>
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
                    <div class="my-2">
                        {{ $entradas->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
