<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    
    <div style="border-right: 2px solid rgba(56,52,49,255); border-left: 2px solid rgba(56,52,49,255)">
        <header class="grid py-2 place-content-center" style='background-color: rgba(56,52,49,255)'>
            <a href="{{route('entrada')}}">
                <img class="w-auto h-14 sm:h-20" src="{{asset('my_images/pepa Antigo.png')}}" alt="">
            </a>
        </header>

        <main class="px-5 mt-8">
            
            @yield('content')
            
        </main>
        

        <footer class="mt-8">
            <p class="flex grid p-5 text-white" style='background-color: rgba(56,52,49,255)' > 
                <strong>PepaGym <br></strong>
                Rua Joana Isabel Matos Lima Dias<br>
                Coruche, Santarém<br>
                2100-175 <br><br>
            </p>

        </footer>
    </div>
</section>
