<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informações do cliente: ') }} <strong>{{$UCliente->user->name}}</strong>
            </h2>
        </header>
        <table class="w-full border border-spacing-2 border-slate-500">
            <thead>
                <th class="px-3 py-2">Mensalidade</th>
                <th class="px-3 py-2">Data de Nascimento</th>
                <th class="px-3 py-2">NIF</th>
                <th class="px-3 py-2">Telefone</th>
                <th class="px-3 py-2">Morada</th>
                <th class="px-3 py-2">Ultimo mês pago</th>
            </thead>
            <tbody>
                <tr>
                    <td class="px-3 py-2 border border-slate-700">{{$UCliente->mensalidade->dias}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UCliente->dtNascimento}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UCliente->NIF}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UCliente->telefone}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UCliente->morada}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UCliente->ultMes}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
