<div>
    <div class="flex justify-between">
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Lista de Equipamentos') }}
        </h2>

        <button
            class='inline-flex items-center px-4 py-2 mb-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3'
            wire:click="adicionar">Adicionar</button>
    </div>
    <div class="py-8 ">
        <div class="bg-white dark:bg-gray-300 rounded-lg shadow-lg">
            <table class="w-full table-auto">
                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Equipamento</th>
                        <th class="px-4 py-3 text-left">Data de Aquisição</th>
                        <th class="px-4 py-3 text-left">Preço</th>
                        <th class="w-1/12 px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-slate-900">
                    @forelse ($equipamentos as $maquina)
                    <tr class="hover:bg-gray-100">
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">{{$maquina->id}}</td>
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">{{$maquina->equipamento}}</td>
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">{{$maquina->dtAquisicao}}</td>
                        <td wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})"
                            class="px-4 py-3">
                            <span
                                class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg dark:text-gray-800 dark:bg-gray-400">{{$maquina->preco}}€</span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <x-dropdown-table>
                                <x-slot name="trigger">
                                    <button
                                        class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link-table wire:click="alterar({{$maquina->id}})">
                                        Alterar
                                        </x-dropdown-link>
                                        <x-dropdown-link-table
                                            wire:click="$dispatch('openModal', {component: 'modals.confirmacao-delete', arguments: {maquina:{{$maquina->id}}}})">
                                            Excluir
                                            </x-dropdown-link>
                                            <x-dropdown-link-table wire:click='add({{$maquina->id}})'>
                                                + Problema
                                            </x-dropdown-link>
                                </x-slot>
                            </x-dropdown-table>
                        </td>
                    </tr>
                    @empty
                    <td colspan="3">Ainda sem maquinas!</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
