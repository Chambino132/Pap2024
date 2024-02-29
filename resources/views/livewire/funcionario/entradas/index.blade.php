<div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header class="flex justify-between">
                        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Escolha o usuário para ver as entradas') }}
                        </h2>
                    </header>

                    <div class="pt-2 pb-5">
                        <select wire:model="aTabela" wire:click="$dispatch('aTabela::changed')" 
                            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{__('Selecione uma Opção')}}</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->user->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <hr style="border:1px solid red" class="mb-4">

                    <table class="w-full border border-spacing-2 border-slate-500">
                        <thead>
                            <th class="px-3 py-2">#</th>
                            <th class="px-3 py-2">Entrada</th>
                        </thead>         

                        <tbody>   
                            @if ($aTabela == null)
                                <tr>
                                    <td colspan="3">Ainda não selecionou um cliente para ver as entradas!</td>
                                </tr>                                
                            @else
                                <tr>
                                    @dd($aTabela)
                                <tr>
                            @endif
                        </tbody>                                         
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
