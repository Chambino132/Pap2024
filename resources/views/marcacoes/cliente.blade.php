<x-app-layout>
    <x-slot name="pageTitle">

        Marcações
    </x-slot>
    @if (Auth::user()->utype == "Cliente")
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:marcacao.marcar>
                </div>
            </div>
        </div>
    </div>
    @endif
    

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:marcacao.ver>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</x-app-layout>