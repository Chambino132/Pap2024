<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            body{--scrollbar-width: 5px; --scrollbar-border-radius: 0px; --scrollbar-border-thickness: 0px; --show-double-buttons: none; --scrollbar-thumb-color: #DE2D2D; --scrollbar-height: 5px; } body::-webkit-scrollbar { width: var(--scrollbar-width, 20px); height: var(--scrollbar-height, 20px); }body::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb-color, #3B82F6); border: var(--scrollbar-border-thickness, 3px) solid var(--scrollbar-border-color, rgb(255, 255, 255)); border-radius: var(--scrollbar-border-radius, 4px); }body::-webkit-scrollbar-track { background: var(--scrollbar-track-color, #A1A1AA); }body::-webkit-scrollbar-corner { background: var(--scrollbar-corner-color, #FFFFFF); border: var(--scrollbar-border-thickness, 3px) solid var(--scrollbar-border-color, rgb(255, 255, 255)); border-radius: var(--scrollbar-border-radius, 4px); }body::-webkit-scrollbar-button:vertical:start:increment, #preview::-webkit-scrollbar-button:vertical:end:decrement, #preview::-webkit-scrollbar-button:horizontal:start:increment, #preview::-webkit-scrollbar-button:horizontal:end:decrement { display: var(--show-double-buttons, none);
            }
            
            div { 
                --scrollbar-width: 5px; --scrollbar-height: 5px; --scrollbar-border-thickness: 0px; --scrollbar-thumb-color: #DC5E5E; } div::-webkit-scrollbar { width: var(--scrollbar-width, 20px); height: var(--scrollbar-height, 20px); }div::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb-color, #3B82F6); border: var(--scrollbar-border-thickness, 3px) solid var(--scrollbar-border-color, rgb(255, 255, 255)); border-radius: var(--scrollbar-border-radius, 4px); }div::-webkit-scrollbar-track { background: var(--scrollbar-track-color, #A1A1AA); }div::-webkit-scrollbar-corner { background: var(--scrollbar-corner-color, #FFFFFF); border: var(--scrollbar-border-thickness, 3px) solid var(--scrollbar-border-color, rgb(255, 255, 255)); border-radius: var(--scrollbar-border-radius, 4px); }div::-webkit-scrollbar-button:vertical:start:increment, #preview::-webkit-scrollbar-button:vertical:end:decrement, #preview::-webkit-scrollbar-button:horizontal:start:increment, #preview::-webkit-scrollbar-button:horizontal:end:decrement { display: var(--show-double-buttons, none); 
            } 
        </style>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="font-sans antialiased ">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
            

            <!-- Page Heading -->
            @if (isset($header))

                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="flex justify-between">
                            {{ $header }}
                            
                            @if (session('sucesso'))
                                <div class="px-4 py-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md" role="alert">
                                    <div class="flex">
                                    <div class="py-1"><svg class="w-6 h-6 mr-4 text-teal-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                    <div>
                                        <p class="font-bold">{{Session::get('sucesso')}}</p>
                                    </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </header>
            @endif
            
            <!-- Page Content -->
            <main>
                <x-notifications />
                {{ $slot }}
            </main>
            <div class="fixed bottom-0 right-5">
                <livewire:chat.chat>
            </div>

            <div class="absolute top-5 right-7 sm:right-28">
                <x-theme-toggle></x-theme-toggle>
            </div>

        </div>
        

        @livewire('wire-elements-modal')

        @livewireScripts

    </body>
</html>
