<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="my_images/PepaGym.svg" rel="icon">

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
        @livewireStyles
    </head>
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="font-sans antialiased ">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-800 overflow-x-hidden">

            
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
                @if (session('failed'))
                        <div class="grid place-content-end me-10">
                            <div class="overflow-hidden border rounded-lg shadow-lg w-96 bg-gray-100">
                                <div class="p-4">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-blue-400 bi bi-info-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                            <p class="text-sm font-medium leading-5 text-gray-900"> {{Session::get('failed')}} </p>
                                        </div>
                                        <div class="flex flex-shrink-0 ml-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                <x-notifications />
                {{ $slot }}
            </main>
            @if (Auth::user()->utype != "PorConfirmar")    
                <div class="fixed bottom-0 right-5">
                    <livewire:chat.chat>
                </div>
            @endif


        </div>
        

        @livewire('wire-elements-modal')

        @livewireScripts

    </body>
</html>
