<div>
    <div class="px-10 mt-5">
        <h2 class="text-2xl dark:text-white">Planos Disponiveis</h2>
        <hr class="w-52 border-black dark:border-white">
    </div>
    @foreach ($planos as $plano)
    @if ($loop->first)
        <div class="flex">
    @endif
        <div class="w-1/2 py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                    <div class="p-6 pb-3 text-gray-900 dark:text-gray-100">
                        <header class="flex justify-between">
                            <h2 class="text-2xl font-medium text-gray-900 dark:text-gray-100">
                                {{ $plano->nome }}
                            </h2>
                        <header>
                    </div>
                    <div class="flex">
                        <div class="p-6 pt-0 pb-0 text-sm text-gray-900 dark:text-gray-100">
                            {{ $plano->descricao }}
                        </div>
                        <div class="p-6 pt-0 pb-0 text-3xl text-green-500 font-lg dark:text-lime-500">
                            {{ $plano->preco}}€
                        </div>  
                    </div>
                    <div class="p-6 pt-3 pb-0 text-base font-medium text-gray-900 dark:text-gray-100">
                        Exemplo:
                    </div>
                    <ul class="pb-6 pl-6 text-base font-medium text-gray-900 list-disc list-inside dark:text-gray-100">
                        @foreach ($plano->exercicios as $exercicio)
                            @if ($loop->iteration == 1 || $loop->iteration == 2 )
                                <li>{{$exercicio->nome}} | {{$exercicio->pivot->repeticoes    }}</li>                               
                            @endif
                        @endforeach
                        <li>...</li>
                    </ul>
                    <hr style="border:1px solid red" class="mb-3">
                    <div wire:click='comprar({{$plano->id}})' class="grid place-content-center">
                        <button wire:click="$dispatch('openModal', {component: 'planos.cliente.comprar-modal', arguments: {plano: {{$plano->id}}}})"  class="inline-flex items-center py-2 py-4 mb-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md px-80 px-18 dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">{{ __('Comprar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @if (fmod($loop->iteration, 2) == 0)
        </div>
        <div class="flex">
    @elseif ($loop->last)
        </div>
    @endif
    @endforeach
</div>