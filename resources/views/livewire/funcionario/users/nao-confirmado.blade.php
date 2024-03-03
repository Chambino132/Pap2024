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
                                        <th class="px-3 py-2">Ações</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($usersNC as $userNC)
                                            <tr class="hover:bg-red-800">
                                                <td class="px-3 py-2 border border-slate-700">{{ $userNC->id }}</td>
                                                <td class="px-3 py-2 border border-slate-700">{{ $userNC->name }}</td>
                                                <td class="px-3 py-2 border border-slate-700">{{ $userNC->email }}</td>
                                                <td class="px-3 py-2 border border-slate-700"><button
                                                        class="inline-flex items-center px-4 px-12 py-2 py-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                                        wire:click='mudar({{ $userNC->id }})'>
                                                        {{ __('Associar') }}
                                                    </button></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Ainda sem users por confirmar!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>




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

                   

                        <div class="pb-5">
                            <select wire:model="tipo" id="tipo" name="tipo"
                                wire:change="$dispatch('tipo::changed')"
                                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="0">{{ __('Selecione uma Opção') }}</option>
                                <option value="Cliente">{{ __('Cliente') }}</option>
                                <option value="Personal">{{ __('Personal') }}</option>
                                @if (Auth::user()->utype == 'Admin')
                                    <option value="Funcionario">{{ __('Funcionario') }}</option>
                                @endif
                            </select>
                        </div>

                        <hr style="border:1px solid red" class="mb-3">
                        @if ($tipo != "0" && $tipo)
                            
                        <form wire:submit='guardar'>
                        @if ($tipo == 'Cliente')
                            <div class="pb-5">
                                <x-input-label for="mensalidade_id" :value="__('Mensalidades')" />
                                <select wire:model='mensalidade_id' id="mensalidade_id" name="mensalidade_id"
                                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{ __('Selecione uma Opção') }}</option>
                                    @foreach ($mensalidades as $mensalidade)
                                        <option value="{{ $mensalidade->id }}">{{ $mensalidade->dias }} Dias/semana
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="pb-5">
                                <x-input-label for="NIF" :value="__('NIF')" />
                                <x-text-input wire:model='NIF' id="NIF" name="NIF" type="text"
                                    class="block w-full mt-1" :value="old('NIF')" />
                                <x-input-error class="mt-2" :messages="$errors->get('NIF')" />
                            </div>
                        @elseif ($tipo == 'Personal')
                            <div class="pb-5">
                                <x-input-label for="atividade_id" :value="__('Atividade')" />
                                <select wire:model='atividade_id' id="atividade_id" name="atividade_id"
                                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{ __('Selecione uma Opção') }}</option>
                                    @foreach ($atividades as $atividade)
                                        <option value="{{ $atividade->id }}">{{ $atividade->atividade }}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif

                        @if ($tipo == 'Funcionario')
                        <div class="pb-5">
                            <x-input-label :value="__('Cargo')"/>
                            <x-text-input wire:model='cargo'  class="block w-full mt-1"/>
                            <x-input-error class="mt-2" :messages="$errors->get('cargo')"/>
                        </div>
                        {{-- Imagem --}}
                        <div class="grid grid-cols-1 space-y-2">
                            <x-input-label :value="__('Foto')"/>
                            <div class="items-center justify-center w-full ">
                                @if ($imagem && getimagesize($imagem->getRealPath()))
                
                                    @if(in_array($imagem->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                                        <img class="w-full rounded-md h-13" src="{{ $imagem->temporaryUrl() }}">
                                    @else
                                        <div class="flex items-center justify-center w-full">
                                            <label class="flex flex-col w-full p-10 text-center border-4 rounded-lg h-30 group">
                                                <div class="flex flex-col items-center justify-center w-full h-5 text-center">
                                                    {{-- Falta corrigir o drag --}}
                                                    <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as imagens até aqui</span><br/> ou <a class="text-blue-600 hover:underline">clique aqui</a> para escolher uma imagem</p>
                                                </div>
                                                <input wire:model="imagem" type="file" name="file" class="hidden">
                                            </label>
                                        </div>
                                        <span class="text-xs text-red-500">Este tipo de imagem não é suportada</span>
                                    @endif
                                
                                @else    
                                    <label class="flex flex-col w-full p-10 text-center border-4 rounded-lg h-30 group">
                
                                        <div class="flex flex-col items-center justify-center w-full h-5 text-center">
                                            <p class="text-gray-500 pointer-none "><span class="">Arraste e largue as imagens até aqui</span><br/> ou <a class="text-blue-600 hover:underline">clique aqui</a> para escolher uma imagem</p>
                                        </div>
                                            
                                        <input wire:model="imagem" type="file" name="file" class="hidden">
                                    </label>
                                @endif
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
                        </div>
                
                        @if ($imagem && in_array($imagem->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif', 'webp']))
                            <x-input-label>
                                <div calss="flex">
                                    <x-secondary-button wire:click="rmvimg" class="justify-center w-full mt-3">Remover imagem</x-secondary-button>
                                </div>
                            </x-input-label>
                        @endif
                
                        <x-input-label>
                            <span>Use apenas ficheiros jpeg. png. jpg. etc.</span>
                        </x-input-label>
                        {{-- Fim Imagem --}}
                        @else
                        
                        <div class="pb-5">
                            <x-input-label for="dtNascimento" :value="__('Data de Nascimento')" />
                            <x-text-input wire:model='dtNascimento' id="dtNascimento" name="dtNascimento" type="date"
                                class="block w-full mt-1" :value="old('dtNascimento')" />
                            <x-input-error class="mt-2" :messages="$errors->get('dtNascimento')" />
                        </div>
                        @endif

                        
                        <div class="pb-5">
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input wire:model='telefone' id="telefone" name="telefone" type="text"
                                class="block w-full mt-1" :value="old('telefone')" />
                            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                        </div>
                        <div class="pb-5">
                            <x-input-label for="morada" :value="__('Morada')" />
                            <x-text-input wire:model='morada' id="morada" name="morada" type="text"
                                class="block w-full mt-1" :value="old('morada')" />
                            <x-input-error class="mt-2" :messages="$errors->get('morada')" />
                        </div>

                        <div class="flex">
                            <x-primary-button wire:click="$dispatch('$refresh')"
                                type="submit">{{ __('Associar') }}</x-primary-button>
                                <x-input-error class="mt-2" :messages="$errors->get('dtNascimento')" />  
                    </form>
                    @endif
                    <x-secondary-button wire:click="cancelar">{{ __('Cancelar') }}</x-secondary-button>
                </div>
            </div>
        </div>
    @endif
</div>
