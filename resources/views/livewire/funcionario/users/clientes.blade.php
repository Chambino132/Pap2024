
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
                            <th class="px-3 py-2">Ações</th>
                        </thead>
                        <tbody>
                            @forelse ($usersC as $userC)
                            <tr class="hover:bg-red-800">
                                <td wire:click="$dispatch('openModal', {component: 'funcionario.users.cliente-modal', arguments:{UCliente: {{$userC->cliente->id}}}})" class="px-3 py-2 border border-slate-700">{{ $userC->cliente->id }}</td>
                                <td wire:click="$dispatch('openModal', {component: 'funcionario.users.cliente-modal', arguments:{UCliente: {{$userC->cliente->id}}}})" class="px-3 py-2 border border-slate-700">{{ $userC->name }}</td>
                                <td wire:click="$dispatch('openModal', {component: 'funcionario.users.cliente-modal', arguments:{UCliente: {{$userC->cliente->id}}}})" class="px-3 py-2 border border-slate-700">{{ $userC->email }}</td>
                                <td class="px-3 py-2 border border-slate-700">
                                    <button wire:click='saveEntrada({{$userC->id}})' class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3'>+ Entrada</button>
                                </td>
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
