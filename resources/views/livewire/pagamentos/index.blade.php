<div class="py-6">
    @if ($porConfirmar->count() > 0)
        <div class="relative px-4 py-3 mx-auto mb-5 text-blue-700 bg-blue-300 border border-blue-500 rounded max-w-7xl sm:px-6 lg:px-8 flash-message">
        <strong>Atenção! Existem <span class="underline">{{$porConfirmar->count()}} utilizadores</span> por confirmar!</strong>
        </div>
    @endif

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="py-4 ">
                    <h2 class="text-2xl">Pagamentos de: {{$mes}}</h2>
                    <hr class="pb-5 border-black dark:border-white" style="width: 172px">
                    <div class="lg:flex">    
                        <div class="sm:flex md:w-2/3">
                            <div class="w-1/2 p-3 bg-green-300 border dark:bg-green-500 border-1 border-slate-600">
                                <div class="flex justify-between">
                                    <h2 class="text-4xl">Pagos</h2>
                                    <x-text-input wire:model.live='searchPagos' class="w-1/2 h-12" placeholder="Pesquisa"></x-text-input>
                                </div>
                                <hr class="mt-2 mb-5 border border-1 dark:border-white border-slate-800">
                                @forelse ($clientesPagos as $cliente)
                                <div wire:key="{{$cliente->id}}P" wire:click='$dispatch("openModal", {component: "pagamentos.modal", arguments: {cliente: {{$cliente->id}}}})' class="px-5 py-3 mb-3 bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-200 h-28 rounded-xl">
                                    <div class="flex justify-between mb-5">
                                        <h2 class="text-2xl">{{$cliente->user->name}} </h2>
                                    </div>
                                    <div class="flex justify-between me-10">
                                        <h2 class="text-2xl">{{$cliente->mensalidade->dias}}x Semana</h2>
                                        <h2 class="text-2xl">{{$cliente->mensalidade->preco}}€ </h2>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                            <div class="w-1/2 p-3 bg-yellow-300 border dark:bg-yellow-400 border-1 border-slate-600">
                                <div class="flex justify-between">
                                    <h2 class="text-4xl">Por Pagar</h2>
                                    <x-text-input wire:model.live='searchPorPagar' class="w-1/2 h-12" placeholder="Pesquisa"></x-text-input>
                                </div>
                                <hr class="mt-2 mb-5 border border-1 dark:border-white border-slate-800">
                                @forelse ($clientesPorPagar as $cliente)
                                <div wire:key="{{$cliente->id}}PP" wire:click='$dispatch("openModal", {component: "pagamentos.modal", arguments: {cliente: {{$cliente->id}}}})' class="px-5 py-3 mb-3 bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-200 h-28 rounded-xl">
                                    <div class="flex justify-between mb-5">
                                        <h2 class="w-48 text-2xl truncate">{{$cliente->user->name}}</h2>
                                        <button wire:click.prevent='registar({{$cliente->id}})' class="'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs 
                                        text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white 
                                        active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Registar</button>
                                    </div>
                                    <div class="flex justify-between me-10">
                                        <h2 class="text-2xl">{{$cliente->mensalidade->dias}}x Semana</h2>
                                        <h2 class="text-2xl">{{$cliente->mensalidade->preco}}€ </h2>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                        <div class="w-1/3 p-3 bg-red-300 border dark:bg-red-500 border-1 border-slate-600">
                            <div class="flex justify-between">
                                <h2 class="text-4xl">Atrasados</h2>
                                <x-text-input wire:model.live='searchAtrasados' class="w-1/2 h-12" placeholder="Pesquisa"></x-text-input>
                            </div>
                            <hr class="mt-2 mb-5 border border-1 dark:border-white border-slate-800">
                            @forelse ($clientesAtrasados as $cliente)
                                <div wire:key="{{$cliente->id}}A" wire:click='$dispatch("openModal", {component: "pagamentos.modal", arguments: {cliente: {{$cliente->id}}}})' class="px-5 py-3 mb-3 bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-200 h-28 rounded-xl">
                                    <div class="flex justify-between mb-5">
                                        <h2 class="w-48 text-2xl truncate">{{$cliente->user->name}} </h2>
                                        <button wire:click.prevent='registar({{$cliente->id}})' class="'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs 
                                        text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white 
                                        active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ">Registar</button>
                                    </div>
                                    <div class="flex justify-between me-10">
                                        <h2 class="text-2xl">{{$cliente->mensalidade->dias}}x Semana</h2>
                                        <h2 class="text-2xl">{{$cliente->mensalidade->preco}}€ </h2>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
