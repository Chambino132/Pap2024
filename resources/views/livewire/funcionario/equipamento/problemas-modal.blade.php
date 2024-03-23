<div  class="w-full bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Lista de Problemas de:') }} {{$maquina->equipamento}}
            </h2>
            <hr class="border-black dark:border-white" style="width: 205px">

        <div class="py-3 ">
            <div class="bg-white dark:bg-gray-300 rounded-lg shadow-lg overflow-hidden">
                <table class="w-full table-auto">
                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                            <tr>
                                <th class="px-4 py-3 text-left">#</th>
                                <th class="px-4 py-3 text-left">Problema</th>
                                <th class="px-4 py-3 text-left">Estado</th>
                                <th class="w-1/12 px-4 py-3">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 dark:text-slate-900">
                            @forelse ($maquina->problemas as $problema)
                            <tr class="hover:bg-gray-100">  
                                <td class="px-4 py-3">
                                    {{$problema->id}}
                                </td>
                                <td class="px-4 py-3">{{$problema->problema}}
                                </td>
                                <td class="px-4 py-3 flex">
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">{{$problema->estado}}</span>
                                </td>
                                
                                <td class="px-4 py-3 text-center">

                                    <button wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deleteprob', arguments: {problema:{{$problema->id}}}})" class="p-3 bg-red-600 rounded focus:outline-none border border-slate-950">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                          </svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>                               
                                    <td colspan="4">Ainda sem Problemas!</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

