<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<section class="max-w-2xl mx-auto bg-white border border-2 border-gray-900 ">
    
    
        <header class="grid place-content-center" style="background-color: rgba(56,52,49,255)">
            <a href="{{route('entrada')}}" class="my-2">
                <img class="w-auto h-14 sm:h-20" src="{{asset('my_images/pepa Antigo.png')}}" alt="">
            </a>
        </header>

        <main class="p-5 " style="background-color: rgba(56,52,49,255)">
            
            @yield('content')
            
        </main>
        

        <footer class="pt-5" style="background-color: rgba(56,52,49,255)">
            <p class="flex grid p-5 text-white"> 
                <strong>PepaGym <br></strong>
                Rua Joana Isabel Matos Lima Dias<br>
                Coruche, Santarém<br>
                2100-175 <br><br>
            </p>

        </footer>

</section>
