<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-12 py-5 overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('As Suas Entradas') }} 
                </h2>
                <table class="w-full mt-3 border table-fixed border-slate-700 border-spacing-2 dark:text-gray-100 dark:border-gray-500">
                    <thead>
                    <tr>
                        <th class="px-3 py-2">Dia</th>
                        <th class="px-3 py-2">Hora</th>

                    </tr>
                    </thead>
                    <tbody>

                            @forelse ($presencas as $presenca)
                            <tr>
                                <th class="px-3 py-2 border border-slate-500">{{$presenca->dia}}</th>
                                <th class="px-3 py-2 border border-slate-500">{{$presenca->hora}}</th>
                            </tr>
                            @empty
                            <tr>
                                <th class="px-3 py-2 border border-slate-500" colspan="2">Ainda Sem Entradas</th>
                            </tr>
                            @endforelse
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
