<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informações do Tecnico: ') }} <strong>{{$UPersonal->user->name}}</strong>
            </h2>
            <hr class="border-black dark:border-white" style="width: 220px">
        </header>
        <div class="py-3 ">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-400">
                <table class="w-full table-auto">
                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                            <tr>
                                <th class="px-4 py-3 text-left">Data de Nascimento</th>
                                <th class="px-4 py-3 text-left">Telefone</th>
                                <th class="px-4 py-3 text-left">Morada</th>
                                <th class="px-4 py-3 text-left">Atividade</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 dark:text-slate-900">
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="px-4 py-3">
                                    {{$UPersonal->dtNascimento}}
                                </td>
                                <td class="px-4 py-3">{{$UPersonal->telefone}}</td>
                                <td class="px-4 py-3">{{$UPersonal->morada}}</td>
                                <td class="px-4 py-3">
                                    @foreach ($UPersonal->atividades as $item)
                                    @if ($loop->iteration != 1)
                                        /
                                    @endif
                                    {{$item->atividade}} 
                                    @endforeach
                                    {{-- {{$UPersonal->atividade->atividade}} --}}
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
