<div @click.outside="$dispatch('closeModal')">
    <div class="mx-auto max-w-7xl">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tecnicos') }}
                </h2>
                <hr class="border-black dark:border-white" style="width: 97px">

                <div class="flex mt-5">
                    <div class="w-2/3 border-r-2 border-gray-100 dark:border-gray-700">
                        <div class="px-8 ">

                            <div class="overflow-hidden bg-white dark:bg-gray-300 rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                        <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">
                        
                                            <tr>
                                                <th class="px-4 py-3 text-center">Tecnicos Associados</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-900 dark:text-slate-900">
                                            @foreach ($tecnicosIN as $IN)
                                            
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-3 text-center">
                                                    {{$IN->user->name}}
                                                </td>
                                            </tr>
                                                
                                                @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 pl-5">
                        <h2 class="text-md">{{ __('Associar Tecnicos') }}</h2>
                        <hr class="border-black dark:border-white" style="width: 128px">
                        <form wire:submit='associar'>
                            <select wire:model.live='associados' id="perPage" class="mt-5 overflow-auto border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-40" multiple>
                            @foreach ($tecnicosOUT as $OUT)
                                <option value="{{$OUT->id}}">{{$OUT->user->name}} </option>
                            @endforeach
                            </select>
                            <x-primary-button class="mt-2">Associar</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
