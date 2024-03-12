    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Personal Trainers') }}
                            </h2>
                        </header>

                        <div class="py-8 ">
                            <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                            <tr>
                                                <th class="px-4 py-3 text-left">#</th>
                                                <th class="px-4 py-3 text-left">Nome</th>
                                                <th class="px-4 py-3 text-left">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-900 dark:text-slate-900">
                                            @forelse ($usersP as $userP)
                                            <tr wire:click="$dispatch('openModal', {component: 'funcionario.users.personal-modal', arguments:{UPersonal: {{$userP->personal->id}}}})" class="hover:bg-gray-100">
                                                <td class="px-4 py-3">
                                                    {{ $userP->id }}
                                                </td>
                                                <td class="px-4 py-3">{{ $userP->name }}</td>
                                                <td class="px-4 py-3">{{ $userP->email }}</td>
                                                
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Ainda sem contactos!</td>
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

