<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PepaGym</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="my_images/PepaGym.svg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/my_style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Hidayah
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/hidayah-free-simple-html-template-for-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
      body{--scrollbar-width: 5px; --scrollbar-border-radius: 0px; --scrollbar-border-thickness: 0px; --show-double-buttons: none; --scrollbar-thumb-color: #DE2D2D; --scrollbar-height: 5px; } body::-webkit-scrollbar { width: var(--scrollbar-width, 20px); height: var(--scrollbar-height, 20px); }body::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb-color, #3B82F6); border: var(--scrollbar-border-thickness, 3px) solid var(--scrollbar-border-color, rgb(255, 255, 255)); border-radius: var(--scrollbar-border-radius, 4px); }body::-webkit-scrollbar-track { background: var(--scrollbar-track-color, #A1A1AA); }body::-webkit-scrollbar-corner { background: var(--scrollbar-corner-color, #FFFFFF); border: var(--scrollbar-border-thickness, 3px) solid var(--scrollbar-border-color, rgb(255, 255, 255)); border-radius: var(--scrollbar-border-radius, 4px); }body::-webkit-scrollbar-button:vertical:start:increment, #preview::-webkit-scrollbar-button:vertical:end:decrement, #preview::-webkit-scrollbar-button:horizontal:start:increment, #preview::-webkit-scrollbar-button:horizontal:end:decrement { display: var(--show-double-buttons, none);
            }
    </style>
  
</head>

<body style="height:100vh;" class="d-flex flex-column min-vh-100">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{route('entrada')}}">PepaGym</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          @if (Route::currentRouteName() == 'entrada')
            <li><a class="nav-link active" href="{{route('entrada')}}">Inicio</a></li> 
          @else
            <li><a class="nav-link" href="{{route('entrada')}}">Inicio</a></li>
          @endif

          @if (Route::currentRouteName() == 'sobre')
             <li><a class="nav-link active" href="{{route('sobre')}}">Sobre</a></li>
          @else
             <li><a class="nav-link" href="{{route('sobre')}}">Sobre</a></li>
          @endif

          @if (Route::currentRouteName() == 'noticias')
            <li><a class="nav-link active" href="{{route('noticias')}}">Notícias</a></li>
          @else
            <li><a class="nav-link" href="{{route('noticias')}}">Notícias</a></li>
          @endif

          @if (Route::currentRouteName() == 'galeria')
            <li><a class="nav-link active" href="{{'galeria'}}">Galeria</a></li>
          @else
            <li><a class="nav-link" href="{{'galeria'}}">Galeria</a></li>
          @endif

          @if (Route::has('login'))
                    @auth
                       <li> <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Painel</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sessão</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Criar Conta</a></li>
                        @endif
                    @endauth
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


    @yield('content')

 
  <!-- ======= Footer ======= -->
  <footer id="footer" class="mt-auto">
      <div class="footer-top">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="row justify-content-between">

                <div class="col-lg-3 col-md-6 footer-links">
                  <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('entrada')}}">Início</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('sobre')}}">Sobre nós</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('noticias')}}">Notícias</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('galeria')}}">Galeria</a></li>
                  </ul>
                </div>

                

                <div class="col-lg-3 col-md-6 footer-contact">
                  <h4>Morada</h4>
                  <p>
                    Rua Joana Isabel Matos Lima Dias<br>
                    Coruche, Santarém<br>
                    2100-175 <br><br>
                    <strong>Telefone:</strong> +351 938 603 356<br>
                  </p>

                </div>

                <div class="col-lg-3 col-md-6 footer-info">
                  <h3>Sobre PepaGym</h3>
                  <p>Horario de Funcionamento:<br>
                  Segunda a Sexta: das 09:15 às 21:15 <br>
                  Sabado: das 10:00 às 13:00 <br> </p>
                  Domingo e feriados: Encerrado 
                  <div class="mt-3 social-links">
                    <a href="https://www.facebook.com/p/PepaGym-100057482319151/?locale=pt_PT" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="https://instagram.com/pepagym_2008?igshid=MXNhZHV3M3kzZzA2cw==" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Hidayah</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/hidayah-free-simple-html-template-for-corporate/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  @livewire('wire-elements-modal')
</body>

</html>