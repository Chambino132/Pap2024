<div class="py-12 ">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-slate-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                    Lista de Funcionarios
                </h2>
                <hr class="w-48 border-black dark:border-white">
                <div>
                    <x-text-input wire:model.live='search' class="w-1/2 mt-2 me-3" placeholder="Pesquisa"></x-text-input>
                    <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                        <option value="10">10 Linhas</option>
                        <option value="25">25 Linhas</option>
                        <option value="50">50 Linhas</option>
                    </select>
                </div>
                
                <hr style="border:1px solid red" class="mb-4 mt-4" >
                <div>

                    <div class="bg-white rounded-lg shadow-lg dark:bg-gray-400">
                        <table class="w-full table-auto rounded-lg">
                            <thead class="text-white bg-red-500 rounded-lg shadow-lg dark:bg-red-700">

                                <tr>
                                    <th class="px-4 py-3 text-left">#</th>
                                    <th class="px-4 py-3 text-left">Nome</th>
                                    <th class="px-4 py-3 text-left">Email</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-slate-900">
                                @forelse ($funcionarios as $funcionario)
                                <tr wire:click="$dispatch('openModal', {component: 'funcionario.users.funcionario-modal', arguments:{funcionario: {{$funcionario->funcionario->id}}}})" class="hover:bg-gray-100 dark:hover:bg-gray-300">
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
                    <div class="my-2">
                        {{$funcionarios->links(data: ['scrollTo' => false])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
