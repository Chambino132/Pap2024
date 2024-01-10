<div>
    @if ($alterar == false)
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
                            <div class="pb-3">
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

                            <button class="inline-flex items-center px-4 px-12 py-2 py-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800" wire:click='mudar'>
                                {{ __('Associar') }}
                            </button>
                            
                            
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

                    <form wire:submit='guardar'>
                        <div class="pt-2 pb-5">
                            <select wire:model='user_id' id="user_id" name="user_id"
                                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{__('Selecione uma Opção')}}</option>
                                @foreach ($usersNC as $userNC)
                                    <option value="{{ $userNC->id }}">{{ $userNC->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pb-5">
                            <select wire:model="tipo" id="tipo" name="tipo" wire:change="$dispatch('tipo::changed')"
                                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{__('Selecione uma Opção')}}</option>
                                <option value="Cliente">{{ __('Cliente') }}</option>
                                <option value="Personal">{{ __('Personal') }}</option>
                            </select>
                        </div>

                        <hr style="border:1px solid red" class="mb-3">
                        
                        @if ($tipo == 'Cliente')
                            <div class="pb-5">
                                <x-input-label for="mensalidade_id" :value="__('Mensalidades')" />
                                <select  wire:model='mensalidade_id' id="mensalidade_id" name="mensalidade_id"
                                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{__('Selecione uma Opção')}}</option>
                                    @foreach ($mensalidades as $mensalidade)                   
                                        <option value="{{$mensalidade->id}}">{{ $mensalidade->Dias }} Dias/semana</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                        
                        <div class="pb-5">
                            <x-input-label for="NIF" :value="__('NIF')" />
                            <x-text-input  wire:model='NIF' id="NIF" name="NIF" type="text" class="block w-full mt-1" :value="old('NIF')" />
                            <x-input-error class="mt-2" :messages="$errors->get('NIF')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="dtNascimento" :value="__('Data de Nascimento')" />
                            <x-text-input wire:model='dtNascimento' id="dtNascimento" name="dtNascimento" type="date" class="block w-full mt-1" :value="old('dtNascimento')" />
                            <x-input-error class="mt-2" :messages="$errors->get('dtNascimento')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input wire:model='telefone' id="telefone" name="telefone" type="text" class="block w-full mt-1" :value="old('telefone')" />
                            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="morada" :value="__('Morada')" />
                            <x-text-input wire:model='morada' id="morada" name="morada" type="text" class="block w-full mt-1" :value="old('morada')" />
                            <x-input-error class="mt-2" :messages="$errors->get('morada')" />
                        </div>

                        <div class="flex">
                            <x-primary-button wire:click="$dispatch('$refresh')" type="submit">{{ __('Associar') }}</x-primary-button>
                    </form>

                    <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button>
                </div>

            </div>
        </div>
    @endif
</div>
