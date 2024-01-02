<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-12 py-5 bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
@if ($estEdit == false)

                <x-primary-button wire:click="edit">{{ __('Editar') }}</x-primary-button>
                <table class="mt-3 w-full table-fixed border border-slate-700 border-spacing-2 dark:text-gray-100 dark:border-gray-500">
                    <thead>
                    <tr>
                        <th class="px-3 py-2">Data de Nascimento</th>
                        <th class="px-3 py-2">Telefone</th>
                        <th class="px-3 py-2">NIF</th>
                        <th class="px-3 py-2">Morada</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th class="px-3 py-2 border border-slate-500">{{$cliente->pluck('dtNascimento')->first()}}</th>
                            <th class="px-3 py-2 border border-slate-500">{{$cliente->pluck('telefone')->first()}}</th>
                            <th class="px-3 py-2 border border-slate-500">{{$cliente->pluck('NIF')->first()}}</th>
                            <th class="px-3 py-2 border border-slate-500">{{$cliente->pluck('Morada')->first()}}</th>
                    </tbody>
                </table>
             
            
@else
<h2 class="mb-5 text-lg font-medium text-gray-900 dark:text-gray-100">
    {{ __('Editar Informações') }} 
</h2>
<form wire:submit="update">
    @csrf
    <div class="mb-5 px-3">
        <x-input-label for="telefone" :value="__('Telefone')" />
        <x-text-input wire:model="telefone" id="telefone" name="telefone" type="text" class="mt-1 block w-full" :value="$cliente->pluck('telefone')->first()" />
        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
    </div>
    <div class="px-3">
        <x-input-label for="Morada" :value="__('Morada')" />
        <x-text-input wire:model="Morada" id="Morada" name="Morada" type="text" class="mt-1 block w-full" :value="$cliente->pluck('Morada')->first()" />
        <x-input-error class="mt-2" :messages="$errors->get('Morada')" />
    </div>
    <div class="mt-5 px-3">
        <x-primary-button type="submit">{{__('Alterar')}}</x-primary-button>
    
</form>
        <x-primary-button wire:click="cancel" class="ms-5">{{__('Cancelar')}}</x-primary-button>
    </div>
@endif
          </div>
        </div>
    </div>
</div>

