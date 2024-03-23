    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white shadow-sm dark:bg-slate-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Personal Trainers') }}
                            </h2>
                            <hr class="border-black dark:border-white" style="width: 234px">
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
                            <div class=" bg-white dark:bg-gray-400 rounded-lg shadow-lg overflow-hidden">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                            <tr>
                                                <th class="px-4 py-3 text-left">#</th>
                                                <th wire:click='ordenar' class="px-4 pr-10 py-3 text-left flex  dark:hover:bg-red-900 hover:bg-red-700">Nome 
                                                    @if ($ordena)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                      </svg>
                                                    @else
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill mt-1 ms-2" viewBox="0 0 16 16">
                                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                                      </svg>
                                                    @endif</th>
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
                                                    <td class="px-4 py-3" colspan="3">Sem Personal trainers!</td>
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

