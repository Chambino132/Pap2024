<div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
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
            </thead>
            <tbody>
                @forelse ($maquina->problemas as $problema)
                    <tr>
                        <td class="px-3 py-2 border border-slate-700">{{$problema->id}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$problema->problema}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$problema->estado}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Ainda sem maquinas!</td>
                    </tr>
                @endforelse
            </tbody>     
        </table>     
    </div>
</div>

