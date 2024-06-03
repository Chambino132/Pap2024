<div>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Lista de Equipamentos') }}
            <hr class="border-black w-52 dark:border-white">
        </h2>

    <div class="justify-between sm:flex">
        <div>
            <x-text-input wire:model.live='search' class="mt-2 w-96 me-3" wire:blur="$dispatch('pagination::updated')" placeholder="Pesquisa"></x-text-input>
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
        
        <button class='inline-flex items-center self-center px-5 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3'
        wire:click="adicionar">Adicionar</button>
        
    </div>
    <hr style="border:1px solid red" class="mt-4 mb-4" >
        <div class="bg-white dark:bg-gray-400 rounded-lg shadow-lg  {{$class}}">
            <table class="w-full table-auto">
                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                    <tr>
                        <th wire:click="ordena('equipamento')" class="flex px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">Equipamento  
                                @if ($ordenaPor == 'equipamento')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                                @endif
                                </th>
                        <th wire:click='ordena("data")' class="px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700"> 
                            <div class="flex"> Data de Aquisição 
                                @if ($ordenaPor == 'data')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                                @endif
                                </div></th>
                        <th wire:click='ordena("preco")' class="flex px-4 py-3 text-left cursor-pointer dark:hover:bg-red-900 hover:bg-red-700">Preço  
                                @if ($ordenaPor == 'preco')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-down-fill ms-2" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-caret-right-fill ms-2" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                                @endif
                                </th>
                        <th class="w-1/12 px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-slate-900">
                    @forelse ($equipamentos as $maquina)
                    <div >
                        <tr wire:key='{{$maquina->id}}' class="hover:bg-gray-100 dark:hover:bg-gray-300">
                            <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                                class="px-4 py-3">{{$maquina->equipamento}}</td>
                            <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                                class="px-4 py-3">{{$maquina->dtAquisicao}}</td>
                            <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                                class="px-4 py-3">
                                <span
                                    class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-500">{{$maquina->preco}}€</span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <x-dropdown-table>
                                    <x-slot name="trigger">
                                        <button wire:click="changeClass"
                                            class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link-table wire:click="alterar({{$maquina->id}})">
                                            Alterar
                                        </x-dropdown-link>
                                        <x-dropdown-link-table
                                            wire:click="$dispatch('openModal', {component: 'modals.confirmacao-delete', arguments: {maquina:{{$maquina->id}}}})">
                                            Excluir
                                        </x-dropdown-link>
                                        <x-dropdown-link-table wire:click='add({{$maquina->id}})'>
                                            + Problema
                                        </x-dropdown-link>
                                        <x-dropdown-link-table wire:click='exportarProblema({{$maquina->id}})'>
                                            Exportar problemas
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown-table>
                            </td>
                        </tr>
                    </div>
                    @empty
                    <td class="px-4 py-3" colspan="3">Sem maquinas!</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$equipamentos->links(data: ['scrollTo' => false])}}
        </div>
</div>
