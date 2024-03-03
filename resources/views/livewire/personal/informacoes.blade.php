<div>
    @if (!$alt)
        
    
    <div class="py-8 ">

        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-300">
            <table class="w-full table-auto">
                    <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
    
                        <tr>
                            <th class="px-4 py-3 text-left">Data de Nascimento</th>
                            <th class="px-4 py-3 text-left">Telefone</th>
                            <th class="px-4 py-3 text-left">Morada</th>
                            <th class="px-4 py-3 text-left">Atvidade</th>
    
                            <th class="w-1/12 px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900 dark:text-slate-900">
    
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">
                                {{$personal->dtNascimento}}
                            </td>
                            <td class="px-4 py-3">{{$personal->telefone}} </td>
                            <td class="px-4 py-3">{{$personal->morada}} </td>
                            <td class="px-4 py-3">{{$personal->atividade->atividade}} </td>
                            
                            <td class="px-4 py-3 text-center">
                                <button wire:click='alterar'>alterar</button>
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
            <x-text-input wire:model="telefone" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
        </div>
        <div class="px-3">
            <x-input-label for="Morada" :value="__('Morada')" />
            <x-text-input wire:model="morada" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('Morada')" />
        </div>
        <div class="px-3 mt-5">
            <div class="flex">
            <x-primary-button type="submit">{{__('Alterar')}}</x-primary-button>
        
    </form>
    <x-secondary-button wire:click='cancelar'>Cancelar</x-secondary-button>
</div>
</div>
    @endif
</div>
