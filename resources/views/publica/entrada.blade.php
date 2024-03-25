@extends('layouts.base')
@section('content')

<div class="flex-row">
<section id="hero" class="flex-grow-0">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        @if ($hero1)
          <div class="carousel-item active" style="background-image: url({{Storage::url($hero1->imagem)}})">
        @else
          <div class="carousel-item active" style="background-image: url('my_images/hero1.jpg')">
        @endif
        
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown" >Bem vindo ao PepaGym</h2>
              <p class="animated fadeInUp big">Um ginásio na Vila de Coruche, com maquinas e equipamentos da melhor qualidade para se manter em forma!</p>
              <a href="{{route('sobre')}}" class="btn-get-started animated fadeInUp scrollto">Saber Mais</a>
            </div>
          </div>
        </div>
        
        <!-- Slide 2 -->
        @if ($hero2)
          <div class="carousel-item" style="background-image: url({{Storage::url($hero2->imagem)}})">
        @else
          <div class="carousel-item" style="background-image: url('my_images/hero2.jpg')">        
        @endif
        
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">O Seu Conforto Em Primeiro Lugar</h2>
              <p class="mx-5 animated fadeInUp big">O conforto e a saúde dos nossos clientes é a nossa prioridade número 1! Temos uma arquitetura agradável para todos se sentirem o mais confortavel possivel.</p>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        @if ($hero3)
          <div class="carousel-item" style="background-image: url({{Storage::url($hero3->imagem)}})">
        @else
          <div class="carousel-item" style="background-image: url('my_images/hero3.jpg')"> 
        @endif
        
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Uma Equipa Sempre Aqui Para Si</h2>
              <p class="mx-5 animated fadeInUp big">A nossa equipa está sempre disponível para resolver todos os seus problemas, responder às suas duvidas e perzervar a sua segurança durante os seus treinos.</p>
              <p class="mx-5 animated fadeInUp big"> Não só nós, como a comunidade agradavel que mantemos no nosso espaço que cuidaram de si!</p>
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
</div>

    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row justify-content-center">
          @if ($videoImg)
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style="background-image: url({{Storage::url($videoImg->imagem)}})">
          @else
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style="background-image: url('my_images/videoImg.jpg')">
          @endif
          
            <a href="https://www.youtube.com/watch?v=EbA9ebvQMCQ" class="mb-4 glightbox play-btn"></a>
          </div>

          <div class="py-5 col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center px-lg-5">
            <h3>Tudo sobre PepaGym</h3>
            <p>PepaGym é um ginásio situado em Coruche que apesar de não ter um espaço grande como outros, é perfeito para os seus treinos e saúde, com diversos equipamentos novos e cuidados, colaboradores que adoram o que fazem, uma comunidade amigável. Podemos não ser o maior ginásio, mas somos o ginásio ideal para si!</p>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-door-open"></i></div>
              <h4 class="title">Inauguração</h4>
              <p class="description">PepaGym está desde Maio de 2009 a forncecer um local de treino para os seus clientes</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title">Localização</h4>
              <p class="description">Localizado na Rua Joana Isabel Matos Lima Dias</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-building"></i></div>
              <h4 class="title">Estabelicimento</h4>
              <p class="description">Temos uma gama variada equipamentos para contribuir no seu treino, acesso a Personal Trainers. Além dos treinos comuns temos a possibilidade de aulas de grupo.</p>
            </div>

          </div>
        </div>

      </div>
    </section>
    
    <section id="counts" class="counts section-bg">
      <div class="container-fluid">

        <div class="row counters">

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="{{$clientes}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clientes</p>
          </div>

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="{{$equipamentos}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Maquinas de Treino</p>
          </div>

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="{{$anos}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Anos</p>
          </div>

          <div class="text-center col-lg-3 col-6">
            <span data-purecounter-start="0" data-purecounter-end="{{$colaboradores}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Colaboradores</p>
          </div>

        </div>

      </div>
    </section>
@endsection