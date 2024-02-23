<div class= "w-1/2">
    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Clientes') }}
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
                                        @forelse ($usersC as $userC)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-4 py-3">
                                                {{ $userC->id }}
                                            </td>
                                            <td class="px-4 py-3">{{ $userC->name }}</td>
                                            <td class="px-4 py-3">{{ $userC->email }}</td> 
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">Ainda sem Clientes!</td>
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
</div>
