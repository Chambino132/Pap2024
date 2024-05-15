<x-app-layout>
    <x-slot name="pageTitle">
        Dashboard
    </x-slot>

    <livewire:graficos.index>
    
   @if (Auth::user()->utype == 'Cliente' || Auth::user()->utype == 'Personal')
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <livewire:sugestoes.create>

                    </div>
                </div>
            </div>
        </div>
        
        @if (Auth::user()->utype == "Cliente")
            <livewire:cliente.entradas>
        @endif
        
    @elseif (Auth::user()->utype == 'Funcionario' || Auth::user()->utype == 'Admin')
        <livewire:pagamentos.index>
    </div>
    @else
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    Por favor vá ao ginasio, para poder confirmar a sua conta

                </div>
            </div>
        </div>
    </div>
    @endif
    
    

</x-app-layout>
