<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="my_images/pepa.svg" rel="icon">

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
        <div class="min-h-screen bg-gray-100 dark:bg-gray-800">
            
            @include('layouts.navigation')
            
 

            <!-- Page Heading -->
            

                <header class="bg-white shadow dark:bg-slate-900">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ $pageTitle }}
                            </h2>
                            <x-theme-toggle></x-theme-toggle>
                           

                        </div>

                    </div>
                </header>
          
            
            <!-- Page Content -->
            <main>
                <x-notifications />
                {{ $slot }}
            </main>
            <div class="fixed bottom-0 right-5">
                <livewire:chat.chat>
            </div>


        </div>
        

        @livewire('wire-elements-modal')

        @livewireScripts

    </body>
</html>
