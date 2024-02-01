<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Lista de Problemas de') }} {{$maquina->equipamento}}
            </h2>
        </header>
        <table class="w-full border border-spacing-2 border-slate-500">
            <thead>
                <th class="px-3 py-2">#</th>
                <th class="px-3 py-2">Problema</th>
                <th class="px-3 py-2">Estado</th>
                <th class="px-3 py-2">Ações</th>
            </thead>
            <tbody>
                @forelse ($maquina->problemas as $problema)
                    <tr>
                        <td class="px-3 py-2 border border-slate-700">{{$problema->id}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$problema->problema}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$problema->estado}}</td>
                        <td class="px-3 py-2 border border-slate-700">
                            <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="$dispatch('openModal', {component: 'modals.confirmacao-deleteprob', arguments: {problema:{{$problema->id}}}})">Excluir</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Ainda sem Problemas!</td>
                    </tr>
                @endforelse
            </tbody>     
        </table>     
    </div>
</div>

