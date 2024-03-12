<div class="py-12 ">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">Lista de Funcionarios</h2>


                <div class="py-8 ">

                    <div class="bg-white rounded-lg shadow-lg dark:bg-gray-300">
                        <table class="w-full table-auto">
                            <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">

                                <tr>
                                    <th class="px-4 py-3 text-left">#</th>
                                    <th class="px-4 py-3 text-left">Nome</th>
                                    <th class="px-4 py-3 text-left">Email</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-slate-900">
                                @forelse ($funcionarios as $funcionario)
                                <tr wire:click="$dispatch('openModal', {component: 'funcionario.users.funcionario-modal', arguments:{funcionario: {{$funcionario->funcionario->id}}}})" class="hover:bg-gray-100">
                                    <td class="px-4 py-3">
                                        {{$funcionario->funcionario->id}}
                                    </td>
                                    <td class="px-4 py-3">{{$funcionario->name}}</td>
                                    <td class="px-4 py-3">{{$funcionario->email}}</td>
                                </tr>
    
                                @empty
                                    <tr>
                                        <td class="px-4 py-3" colspan="3">Sem Funcionarios</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
