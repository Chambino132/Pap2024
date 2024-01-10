<div class= "w-1/2">
    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Clientes') }}
                        </h2>
                    </header>
                    <table class="w-full border border-spacing-2 border-slate-500">
                        <thead>
                            <th class="px-3 py-2">#</th>
                            <th class="px-3 py-2">Nome</th>
                            <th class="px-3 py-2">Email</th>
                        </thead>
                        <tbody>
                            @forelse ($usersC as $userC)
                            <tr>
                                <td class="px-3 py-2 border border-slate-700">{{ $userC->id }}</td>
                                <td class="px-3 py-2 border border-slate-700">{{ $userC->name }}</td>
                                <td class="px-3 py-2 border border-slate-700">{{ $userC->email }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Ainda sem Users!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
