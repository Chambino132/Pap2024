<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informações do cliente: ') }} <strong>{{$UCliente->user->name}}</strong>
            </h2>
        </header>
        <div class="py-3">

            <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                <table class="w-full table-auto">
                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
        
                            <tr>
                                <th class="px-4 py-3 text-left">Mensalidade</th>
                                <th class="px-4 py-3 text-left">Data de Nascimento</th>
                                <th class="px-4 py-3 text-left">NIF</th>
                                <th class="px-4 py-3 text-left">Telefone</th>
                                <th class="px-4 py-3 text-left">Morada</th>
                                <th class="px-4 py-3 text-left">Ultimo mês pago</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 dark:text-slate-900">
        
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">
                                    {{$UCliente->mensalidade->dias}}
                                </td>
                                <td class="px-4 py-3">{{$UCliente->dtNascimento}}</td>
                                <td class="px-4 py-3">{{$UCliente->NIF}}</td>
                                <td class="px-4 py-3">{{$UCliente->telefone}}</td>
                                <td class="px-4 py-3">{{$UCliente->morada}}</td>
                                <td class="px-4 py-3">
        
                                    <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">@if ($mes < 10)
                                        0{{$mes}}
                                        @else
                                        {{$mes}}
                                    @endif- {{$ano}} </span>
                                </td>
                            </tr>
                            
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
