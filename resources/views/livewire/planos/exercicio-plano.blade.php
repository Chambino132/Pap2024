<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <header>
            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Lista de exercicios do plano: ') }} {{$plano->nome}}
            </h2>
        </header>
        <table class="w-full border border-spacing-2 border-slate-500">
            <thead>
                <th class="px-3 py-2">#</th>
                <th class="px-3 py-2">Nome</th>
                <th class="px-3 py-2">Descrição</th>
                <th class="px-3 py-2">Categoria</th>
                <th class="px-3 py-2">Repetições</th>
                <th class="px-3 py-2">Ações</th>
            </thead>
            <tbody>
                @forelse ($plano->exercicios as $exercicio)
                    <tr>
                        <td class="px-3 py-2 border border-slate-700">{{$exercicio->id}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$exercicio->nome}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$exercicio->descricao}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$exercicio->categoria->nome}}</td>
                        <td class="px-3 py-2 border border-slate-700">{{$exercicio->pivot->repeticoes}}</td>
                        <td class="px-3 py-2 border border-slate-700">
                            <button class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 me-3' wire:click="dessassociar({{$exercicio->id}})">dessassociar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Ainda sem Exercicios!</td>
                    </tr>
                @endforelse
            </tbody>     
        </table>     
    </div>
</div>

