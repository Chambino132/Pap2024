<div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            Informações do Funcionario: {{$funcionario->user->name}}
        </h2>

        <div class="py-8 ">

            <div class="bg-white rounded-lg shadow-lg dark:bg-gray-300">
                <table class="w-full table-auto">
                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
        
                            <tr>
                                <th class="px-4 py-3 text-left">Telefone</th>
                                <th class="px-4 py-3 text-left">Morada</th>
                                <th class="px-4 py-3 text-left">Cargo</th>
                                <th class="w-1/12 px-4 py-3">Foto</th>
                                <th class="w-1/12 px-4 py-3">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-900 dark:text-slate-900">
        
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">
                                    {{$funcionario->telefone}}
                                </td>
                                <td class="px-4 py-3">{{$funcionario->morada}}</td>
                                @if ($altering)
                                <td class="px-4 py-3">
                                    <x-text-input wire:blur='cargChang' wire:model='cargo'/>
                                    <x-input-error :messages="$errors->get('cargo')" />
                                </td>
                                @else
                                <td class="px-4 py-3">{{$funcionario->cargo}}</td>
                                @endif
                                
                                <td class="px-4 py-3"><img src="{{Storage::url($funcionario->foto)}}"></td>
                                <td class="px-4 py-3"><button wire:click='altCarg' class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">Alterar Cargo</button></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
