<div>
    <header>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Marcar Marcação') }}
        </h2>
    </header>

    <form wire:submit='marcar'>
        <div class="flex justify-between pb-5 mt-3 ml-10 mr-28 mpt-2">
            <select wire:model='selAtividade' id="atividade" name="atividade_id" wire:change="$dispatch('atividade::changed')"
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-96" >
                <option selected>{{ __('Selecione uma atividade') }}</option>
                @foreach ($atividades as $atividade)
                    <option value="{{ $atividade->id }}">{{ $atividade->atividade }}</option>
                @endforeach

            </select>
            <select wire:model='personal_id' id="personal_id" name="personal_id" 
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-96" @if (!$responsaveis)
                   disabled 
                >
                <option selected>{{ __('Responsável') }}</option>
                @endif>
                @if ($responsaveis != null)
                <option selected>{{ __('Selecione um Responsável') }}</option>
                    @foreach ($responsaveis as $responsavel)
                        <option value="{{$responsavel->id}}">{{$responsavel->user->name}}</option>
                    @endforeach
                @endif
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('personal_id')" />
        </div>
        @if ($he)
        <div class="flex justify-between">
            <div class="w-1/2 pb-5 mt-3 ml-10 mr-28 mpt-2">
               <x-input-label for="dia" :value="__('Dia')" />
               <x-text-input  wire:model='dia' id="dia" name="dia" type="date" class="block w-full mt-1"/>
               <x-input-error class="mt-2" :messages="$errors->get('dia')" />
           </div>
           <div class="w-1/2 pb-5 mt-3 ml-10 mr-28 mpt-2">
               <x-input-label for="hora" :value="__('Hora')" />
               <x-text-input  wire:model='hora' id="hora" name="hora" type="time" class="block w-full mt-1" />
               <x-input-error class="mt-2" :messages="$errors->get('hora')" />
           </div>
       </div>
        @endif
        
        <div class="flex justify-end mr-28">
            <x-primary-button>Marcar</x-primary-button>
        </div>
    </form>

</div>
