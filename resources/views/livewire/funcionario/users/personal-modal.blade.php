<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informações do personal: ') }} <strong>{{$UPersonal->user->name}}</strong>
            </h2>
        </header>
        <table class="w-full border border-spacing-2 border-slate-500">
            <thead>
                <th class="px-3 py-2">Data de Nascimento</th>
                <th class="px-3 py-2">Telefone</th>
                <th class="px-3 py-2">Morada</th>
                <th class="px-3 py-2">Atividade</th>
            </thead>
            <tbody>
                <tr>
                    <td class="px-3 py-2 border border-slate-700">{{$UPersonal->dtNascimento}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UPersonal->telefone}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UPersonal->morada}}</td>
                    <td class="px-3 py-2 border border-slate-700">{{$UPersonal->atividade->atividade}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
