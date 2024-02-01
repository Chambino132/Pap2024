<div>
    <header>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('As suas Marcações') }}
        </h2>
    </header>
    <table class="w-full border border-spacing-2 border-slate-500">
        <thead>
            <th class="px-3 py-2">Data</th>
            <th class="px-3 py-2">Hora</th>
            @if (Auth::user()->utype == "Cliente")
            <th class="px-3 py-2">Responsavel</th>
            @elseif (Auth::user()->utype == "Personal")
            <th class="px-3 py-2">Cliente</th>
            @endif
            <th class="px-3 py-2">Atividade</th>
            <th class="px-3 py-2">Estado</th>
            <th class="px-3 py-2">Ações</th>
        </thead>
        <tbody>
            @forelse ($marcacoes as $marcacao)
            <tr>
                <td class="px-3 py-2 border border-slate-700">{{ $marcacao->dia }}</td>
                <td class="px-3 py-2 border border-slate-700">{{ $marcacao->hora }}</td>
                @if (Auth::user()->utype == "Cliente")
                <td class="px-3 py-2 border border-slate-700">{{ $marcacao->personal->user->name }}</td>
                @elseif (Auth::user()->utype == "Personal")
                <td class="px-3 py-2 border border-slate-700">{{ $marcacao->cliente->name }}</td>
                @endif
                <td class="px-3 py-2 border border-slate-700">{{ $marcacao->personal->atividade->atividade }}</td>
                <td class="px-3 py-2 border border-slate-700">
                @if ($EstadoChan == false)
                {{ $marcacao->estado}}
                @elseif ($loop->iteration == $iteration)
                <select wire:model='estado' id="estado" name="estado" wire:change="StoreEstado({{$marcacao->id}})"
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                <option selected value="pendente">pendente</option>
                <option value="aceite">aceitar</option>
                <option value="recusado">recusar</option>
            </select>
                @else
                {{ $marcacao->estado}}
                @endif
                </td>
                
                <td class="px-3 py-2 border border-slate-700 flex justify-center">
                    <button wire:click='Cancelar({{$marcacao->id}})' class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3">Cancelar</button>
                    @if ($marcacao->estado == "pendente" && Auth::user()->utype == "Personal")
                    <button wire:click='MudEstado({{$loop->iteration}})' class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Mudar Estado</button>
                @endif</td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">Ainda sem Marcações!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
