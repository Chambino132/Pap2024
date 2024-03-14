    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white shadow-sm dark:bg-slate-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Personal Trainers') }}
                            </h2>
                            <hr class="w-60 border-black dark:border-white">
                        </header>
                        <div>
                            <x-text-input wire:model.live='search' class="w-1/2 my-2 me-3" placeholder="Pesquisa"></x-text-input>
                            <select wire:model.live='perPage' id="perPage" class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40'" wire:change="$dispatch('pagination::updated')">
                                <option value="10">10 Linhas</option>
                                <option value="25">25 Linhas</option>
                                <option value="50">50 Linhas</option>
                            </select>
                        </div>
                        
                        <hr style="border:1px solid red" class="mt-1 mb-3">
                        <div>
                            <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                            <tr>
                                                <th class="px-4 py-3 text-left">#</th>
                                                <th class="px-4 py-3 text-left">Nome</th>
                                                <th class="px-4 py-3 text-left">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-900 dark:text-slate-900">
                                            @forelse ($personals as $personal)
                                            <tr wire:click="$dispatch('openModal', {component: 'funcionario.users.personal-modal', arguments:{UPersonal: {{$personal->personal->id}}}})" class="hover:bg-gray-100 dark:hover:bg-gray-300">
                                                <td class="px-4 py-3">
                                                    {{ $personal->personal->id }}
                                                </td>
                                                <td class="px-4 py-3">{{ $personal->name }}</td>
                                                <td class="px-4 py-3">{{ $personal->email }}</td>
                                                
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Ainda sem contactos!</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                </table>
                            </div>
                            <div class="my-2">
                                {{$personals->links(data: ['scrollTo' => false])}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

