@extends('layouts.base')
@section('content')
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Bem vindo à PepaGym</h2>
              <p class="animated fadeInUp big">Um ginásio de Coruche, com maquinas e equipamentos da melhor qualidade para se manter em forma!</p>
              <a href="{{route('sobre')}}" class="btn-get-started animated fadeInUp scrollto">Saber Mais</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">O Seu Conforto Em Primeiro Lugar</h2>
              <p class="mx-5 animated fadeInUp big">O conforto e a saude dos nossos clientes é a nossa prioridade número 1! Temos uma arquitetura agradevel para todos se sentirem o mais confortaveis possivel.</p>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Uma Equipa Sempre Aqui Para Si</h2>
              <p class="mx-5 animated fadeInUp big">A nossa equipa está sempre disponivel para resolver todos os seus problemas, responder às suas duvidas e manterem-no seguro durante os seus treinos. Não só nós, como a comunidade agradavel que montamos no nosso estabelecimento prezervaram pela sua saude!</p>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->
  
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="mb-4 glightbox play-btn"></a>
          </div>

          <div class="py-5 col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center px-lg-5">
            <h3>Tudo sobre PepaGym</h3>
            <p>PepaGym é um ginásio de Coruche que apesar de não ter um espaço grande como outros, é perfeito para os seus treinos e saude, com diversos equipamentos novos e cuidados, trabalhadores que adoram o que fazem e uma comunidade amigável. Podemos não ser o maior ginásio, mas somos o ginásio que vocês precisam!</p>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-door-open"></i></div>
              <h4 class="title"><a href="">Inauguração</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="">Localização</a></h4>
              <p class="description">Localizado na Rua Joana Isabel Matos Lima Dias</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-building"></i></div>
              <h4 class="title"><a href="">Estabelicimento</a></h4>
              <p class="description">Temos dos mais variados equipamentos para contribuir no seu treino, além disso temos aulas em conjunto, acesso e Personal Trainers. Além dos treinos comuns temos acesso a aulas de dança.</p>
            </div>

          </div>
        </div>

      </div>
    </section>
    
    <section id="counts" class="counts section-bg">
      <div class="container-fluid">

        <div class="row counters">

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clientes</p>
          </div>

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="1" class="purecounter"></span>
            <p>Maquinas de Treino</p>
          </div>

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter"></span>
            <p>Anos</p>
          </div>

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trabalhadores</p>
          </div>

        </div>

      </div>
    </section>
@endsection