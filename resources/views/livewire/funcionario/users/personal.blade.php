    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Personal Trainers') }}
                            </h2>
                        </header>
                        <table class="w-full border border-spacing-2 border-slate-500">
                            <thead>
                                <th class="px-3 py-2">#</th>
                                <th class="px-3 py-2">Nome</th>
                                <th class="px-3 py-2">Email</th>
                            </thead>
                            <tbody>
                                @forelse ($usersP as $userP)
                                <tr wire:click="$dispatch('openModal', {component: 'funcionario.users.personal-modal', arguments:{UPersonal: {{$userP->personal->id}}}})" class="hover:bg-red-800">
                                    <td class="px-3 py-2 border border-slate-700">{{ $userP->personal->id }}</td>
                                    <td class="px-3 py-2 border border-slate-700">{{ $userP->name }}</td>
                                    <td class="px-3 py-2 border border-slate-700">{{ $userP->email }}</td>
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

