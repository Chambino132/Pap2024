<div>
@if ($estEdit == false)
                <div class="py-8 ">
                    <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                        <table class="w-full table-auto">
                                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left">Data de Nascimento</th>
                                        <th class="px-4 py-3 text-left">Telefone</th>
                                        <th class="px-4 py-3 text-left">NIF</th>
                                        <th class="px-4 py-3 text-left">Morada</th>
                                        <th class="w-1/12 px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-900 dark:text-slate-900">
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-3">
                                            {{$cliente->dtNascimento}}
                                        </td>
                                        <td class="px-4 py-3">{{$cliente->telefone}}</td>
                                        <td class="px-4 py-3">{{$cliente->NIF}}</td>
                                        <td class="px-4 py-3">
                                            {{$cliente->morada}}
                                        </td>
                                        
                                        <td class="px-4 py-3 text-center">
                                            <x-dropdown-table>
                                                <x-slot name="trigger">
                                                    <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link-table wire:click="edit">
                                                        Editar
                                                    </x-dropdown-link-table>
                                                </x-slot>
                                            </x-dropdown-table>
                                            
                                        </td>
                                    </tr>
                                    
                                </tbody>
                        </table>
                    </div>
                </div>   
@else

<form wire:submit="update">
    @csrf
    <div class="px-3 mb-5">
        <x-input-label for="telefone" :value="__('Telefone')" />
        <x-text-input wire:model="telefone" id="telefone" name="telefone" type="text" class="block w-full mt-1" :value="$cliente->pluck('telefone')->first()" />
        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
    </div>
    <div class="px-3">
        <x-input-label for="morada" :value="__('Morada')" />
        <x-text-input wire:model="morada" type="text" class="block w-full mt-1" :value="$cliente->pluck('morada')->first()" />
        <x-input-error class="mt-2" :messages="$errors->get('morada')" />

    </div>
    <div class="px-3 mt-5">
        <x-primary-button type="submit">{{__('Alterar')}}</x-primary-button>
    
</form>
        <x-secondary-button wire:click="cancel" class="ms-5">{{__('Cancelar')}}</x-secondary-button>
    </div>
@endif
          
</div>

