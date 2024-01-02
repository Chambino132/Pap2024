@if ($alterar == true)
<div>
    <div class="py-2">
        <div class="mx-auto max-w-7x1 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Lista de Users não confirmados') }}
                            </h2>
                        </header>
                        <div = class="pb-3">
                            <table class="w-full border border-spacing-2 border-slate-500">
                                <thead>
                                    <th class="px-3 py-2">#</th>
                                    <th class="px-3 py-2">Nome</th>
                                    <th class="px-3 py-2">Email</th>
                                </thead>
                                <tbody>
                                    @forelse ($usersNC as $userNC)
                                    <tr>
                                        <td class="px-3 py-2 border border-slate-700">{{ $userNC->id }}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{ $userNC->name }}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{ $userNC->email }}</td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Ainda sem users por confirmar!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    <x-primary-button class="px-12 py-4" wire:click='mudar'>{{__('Associar')}}</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="mx-auto mt-3 max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <header>
                <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Selecione os users e o seu novo cargo') }}
                </h2>
            </header>

            <form wire:submit='associar'>
                <div class="pt-2 pb-5">
                    <select multiple id="userNC_id" name="userNC_id[]" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($usersNC as $userNC)
                            <option value="{{ $userNC->id }}">{{$userNC->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="pb-5">
                    <select id="cargo" name="cargo" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="PorConfirmar">{{__('PorConfirmar')}}</option>
                        <option value="Cliente">{{__('Cliente')}}</option>
                        <option value="Personal">{{__('Personal')}}</option>
                        <option value="Funcionario">{{__('Funcionario')}}</option>
                    </select>
                </div>
                <div class="flex">
                    <x-primary-button type="submit">{{__('Associar')}}</x-primary-button>
            </form>

            <x-secondary-button wire:click="desassociar">{{__('Cancelar')}}</x-secondary-button></div>

        </div>
    </div>
</div>
@endif
