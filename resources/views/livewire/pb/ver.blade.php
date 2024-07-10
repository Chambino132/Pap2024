<div>
    <h1 class="text-2xl">Os Seus Pbs</h1>
    <hr class="border-black w-36 dark:border-white">
    <div class="py-8 ">

        <div class=" bg-white overflow-hidden dark:bg-gray-300 rounded-lg shadow-lg {{$class}}">
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">Maquina</th>
                            <th class="px-4 py-3 text-left">PB</th>
                            <th class="px-4 py-3 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
                        @forelse ($pbs as $pb)
                            
                        <tr wire:key="{{$pb->id}}" class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{$pb->equipamento->equipamento}} </td>
                            <td class="px-4 py-3">
                                @if ($isUpdating && $iteration == $loop->iteration)
                                    <div class="flex">
                                        <x-text-input wire:model="newPB" wire:change="update" class="w-20"></x-text-input>
                                        <button wire:click='CanMud'
                                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg ms-2 dark:text-gray-800 dark:bg-gray-400"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z" />
                                            <path
                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466" />
                                        </svg></button>
                                    </div>
                                @else
                                <span class="px-4 py-2 text-gray-800 bg-gray-400 rounded-lg dark:text-gray-800">{{$pb->pb}} </span>              
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <x-dropdown-table>
                                    <x-slot name="trigger">
                                        <button wire:click="changeClass" class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link-table wire:click="alterar({{$loop->iteration}}, {{$pb->id}})">
                                                Alterar
                                        </x-dropdown-link-table>
                                    </x-slot>
                                </x-dropdown-table>
                            </td>
                            
                        </tr>
                        @empty
                        <td class="px-4 py-3">Ainda Sem Recordes Pessoais!</td>
                        @endforelse
                        
                    </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$pbs->links(data: ['scrollTo' => false])}}
        </div>
    </div>
</div>
