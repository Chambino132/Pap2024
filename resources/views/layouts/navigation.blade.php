<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-slate-900 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('entrada') }}">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                    </a>
                </div>
                
                <!-- Navigation Links -->
                
                <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @if (Auth::user()->utype == "Admin" || Auth::user()->utype == "Funcionario")
                    
                <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                    <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                        {{ __('Trabalhadores') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                    <x-nav-link :href="route('equipamento')" :active="request()->routeIs('equipamento')">
                        {{ __('Equipamento') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                    <x-nav-link :href="route('entradas')" :active="request()->routeIs('entradas')">
                        {{ __('Clientes') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                    <x-nav-link :href="route('atividades')" :active="request()->routeIs('atividades')">
                        {{ __('Atividades') }}
                    </x-nav-link>
                </div>
                    <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                        <x-nav-link :href="route('sugestao')" :active="request()->routeIs('sugestao')">
                            {{ __('Sugestões')}}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                        <x-nav-link :href="route('mensalidade')" :active="request()->routeIs('mensalidade')">
                            {{ __('Mensalidades')}}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 text-center xl:-my-px xl:ml-8 xl:flex">
                        <x-nav-link :href="route('customize')" :active="request()->routeIs('customize')">
                            {{ __('Customizar Website')}}
                        </x-nav-link>
                    </div>
                @endif

                @if (Auth::user()->utype == "Cliente" || Auth::user()->utype == "Personal")
                    <div class="hidden space-x-8 xl:-my-px xl:ml-8 xl:flex">
                        <x-nav-link :href="route('marcacoes')" :active="request()->routeIs('marcacoes')">
                            {{ __('Marcações') }}
                        </x-nav-link>
                    </div>
                @endif

                @if (Auth::user()->utype != "PorConfirmar" && Auth::user()->utype != "Personal")
                    <div class="hidden space-x-8 text-center xl:-my-px xl:ml-8 xl:flex">
                        <x-nav-link :href="route('planos')" :active="request()->routeIs('planos')">
                            {{ __('Planos de Treino') }}
                        </x-nav-link>
                    </div> 
                @endif
                

            </div>


            <!-- Settings Dropdown -->
            <div class="hidden xl:flex xl:items-center xl:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-slate-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                        
                    <x-slot name="content">
                    @if (Auth::user()->utype != "PorConfirmar")
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                        
                        <x-dropdown-link :href="route('calendario')">
                            {{ __('Calendario') }}
                        </x-dropdown-link>
                    @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Terminar Sessão') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                
            </div>
            

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 xl:hidden " >
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden xl:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
       
        @if (Auth::user()->utype == "Admin" || Auth::user()->utype == "Funcionario")
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
                {{ __('Trabalhadores') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('equipamento')" :active="request()->routeIs('equipamento')">
                {{ __('Equipamentos') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('entradas')" :active="request()->routeIs('entradas')">
                {{ __('Clientes') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('atividades')" :active="request()->routeIs('ativdiades')">
                {{ __('Atividades') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('sugestao')" :active="request()->routeIs('sugestao')">
                {{ __('Sugestões') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('mensalidade')" :active="request()->routeIs('mensalidade')">
                {{ __('Mensalidades') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('customize')" :active="request()->routeIs('customize')">
                {{ __('Customizar Website') }}
            </x-responsive-nav-link>
        </div>
        @endif

        @if (Auth::user()->utype == "Cliente" || Auth::user()->utype == "Personal")
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('marcacoes')" :active="request()->routeIs('marcacoes')">
                    {{ __('Marcações') }}
                </x-responsive-nav-link>
            </div>
        @endif

        @if (Auth::user()->utype != "PorConfirmar" && Auth::user()->utype != "Personal")
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('planos')" :active="request()->routeIs('planos')">
                {{ __('Planos de Treino') }}
            </x-responsive-nav-link>
        </div>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Terminar Sessão') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
