<div>
    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Equipamentos') }}
                        </h2>
                    </header>
                    <table class="w-full border border-spacing-2 border-slate-500">
                        <thead>
                            <th class="px-3 py-2">#</th>
                            <th class="px-3 py-2">Equipamento</th>
                            <th class="px-3 py-2">Data de Aquisição</th>
                            <th class="px-3 py-2">Preço</th>
                            <th class="px-3 py-2">Ações</th>
                        </thead>
                        <tbody>
                                @forelse ($maquinas as $maquina)
                                    <tr wire:click="$dispatch('openModal', {component: 'funcionario.equipamento.problemas-modal', arguments: {maquina: {{$maquina->id}}}})" class="hover:bg-red-800">
                                        <td class="px-3 py-2 border border-slate-700">{{$maquina->id}}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{$maquina->equipamento}}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{$maquina->dtAquisicao}}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{$maquina->preco}}€</td>
                                        <td class="px-3 py-2 border border-slate-700"><button></button></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Ainda sem maquinas!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                        

