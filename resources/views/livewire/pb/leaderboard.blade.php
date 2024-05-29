<div>
    <h1 class="text-2xl">Leaderboard de Pbs</h1>
    <hr class="w-56 mb-5 border-black dark:border-white">
    <h1 class="mb-2">Escolha uma maquina para ver a LeaderBoard</h1>
    <select wire:model.live="equipamento" class="ml-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        @foreach ($equipamentos as $item)
            <option value="{{$item->id}}">{{$item->equipamento}} </option>
        @endforeach
    </select>
    <div class="py-8 ">

        <div class=" bg-white overflow-hidden dark:bg-gray-300 rounded-lg shadow-lg">
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Cliente</th>
                            <th class="px-4 py-3 text-left">PB</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
                        @foreach ($leaderboard as $pb)
                            
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">
                                {{$loop->iteration}}
                            </td>
                            <td class="px-4 py-3">{{$pb->cliente->user->name}} </td>
                            <td class="px-4 py-3">
                                @if ($loop->iteration == 1)
                                    <span class="px-4 py-2 text-gray-800 dark:text-gray-800 bg-yellow-400 rounded-lg">{{$pb->pb}} </span>
                                @elseif ($loop->iteration == 2)
                                    <span class="px-4 py-2 text-gray-800 dark:text-gray-800 bg-gray-400 rounded-lg">{{$pb->pb}} </span>
                                @elseif ($loop->iteration == 3)
                                    <span class="px-4 py-2 text-white dark:text-white bg-yellow-900 rounded-lg">{{$pb->pb}} </span>
                                @else
                                    {{$pb->pb}}
                                @endif
                                
                            </td>
                            
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
            </table>
        </div>
    </div>
</div>
