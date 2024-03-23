<div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-5 py-5  bg-white shadow-sm sm:rounded-lg dark:bg-gray-900">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('As Suas Entradas') }} 
            </h2>
            <hr class="w-36 border-black dark:border-white">

            <div class="py-3">
                <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg overflow-hidden">
                        <table class="w-full table-auto ">
                            <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                <tr>
                                    <th class="px-4 py-3 text-left">Dia</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-slate-900">
                                @forelse ($presencas as $presenca)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">

                                    <td class="px-4 py-3">{{$presenca->entrada}}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <th class="px-3 py-2 border border-slate-500" colspan="2">Ainda Sem Entradas</th>
                                    </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>
           </div>
        </div>
    </div>
</div>
