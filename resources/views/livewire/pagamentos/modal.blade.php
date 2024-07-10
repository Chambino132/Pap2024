<div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg ">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl">Pagamentos de {{$cliente->user->name}} </h2>

        <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg mt-5">
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">Mês Pago</th>
                            <th class="px-4 py-3 text-left">Data de Pagamento</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
                        @forelse ($cliente->pagamentos as $pagamento)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">
                                    {{$pagamento->mes_pago}}
                                </td>
                                <td class="px-4 py-3">{{$pagamento->data_pag}}</td>
                            </tr>
                        @empty
                            <th class="px-4 py-3 text-left">Sem Pagamentos</th>
                        @endforelse
                        
                    </tbody>
            </table>
        </div>
    </div>
</div>


