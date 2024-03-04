<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-12 py-5  bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
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
                                            {{$cliente->Morada}}
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
<h2 class="mb-5 text-lg font-medium text-gray-900 dark:text-gray-100">
    {{ __('Editar Informações') }} 
</h2>
<form wire:submit="update">
    @csrf
    <div class="px-3 mb-5">
        <x-input-label for="telefone" :value="__('Telefone')" />
        <x-text-input wire:model="telefone" id="telefone" name="telefone" type="text" class="block w-full mt-1" :value="$cliente->pluck('telefone')->first()" />
        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
    </div>
    <div class="px-3">
        <x-input-label for="Morada" :value="__('Morada')" />
        <x-text-input wire:model="morada" id="Morada" name="Morada" type="text" class="block w-full mt-1" :value="$cliente->pluck('Morada')->first()" />
        <x-input-error class="mt-2" :messages="$errors->get('Morada')" />
    </div>
    <div class="px-3 mt-5">
        <x-primary-button type="submit">{{__('Alterar')}}</x-primary-button>
    
</form>
        <x-primary-button wire:click="cancel" class="ms-5">{{__('Cancelar')}}</x-primary-button>
    </div>
@endif
          
</div>

