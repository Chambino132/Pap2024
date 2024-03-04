<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            @if (Auth::user()->utype != "Admin")

            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <section>
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            As Suas Informações
                        </p>
                        @if (Auth::user()->utype == 'Cliente')
                                <livewire:cliente.informacoes>
                            @elseif (Auth::user()->utype == 'Personal')
                                <livewire:personal.informacoes>
                            @elseif (Auth::user()->utype == 'Funcionario')
                                <livewire:funcionario.informacoes>
                        @endif
                    </section>
            </div>
            @endif
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
