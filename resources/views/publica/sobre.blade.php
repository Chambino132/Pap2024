@extends('layouts.base')
@section('content')
<!-- ======= Team Section ======= -->
    <section id="equipa" class="team">
      <div class="container-fluid">

        <div class="section-title">
          <h3 class="pt-3">A nossa <span>Equipa</span> Administrativa</h3>
          <p>Conheça a nossa equipa dedicada, que está sempre aqui para zelar pelo seu conforto e bem estar</p>
        </div>

        <div class="row justify-content-end ">
          <div class="col-xl-10 ">
            <div class="row me-48">
              @forelse ($funcionarios as $funcionario)
              <div class="col-xl-3 col-lg-4 col-md-6 imagem bg-light" style="height: 250px">
                <div class="member bg-light col-sm-10 border border-dark" style="overflow: hidden; position: relative;">
                  <img src="{{Storage::url($funcionario->foto)}}" class="img-fluid w-100 bg-light" style="position: absolute;
                  left: 50%; top: 50%; transform: translate(-50%, -50%); max-width: none; max-height: none; width: auto; height: auto;" alt="">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4>{{$funcionario->user->name}} </h4>
                      <span>{{$funcionario->cargo}} </span>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <h2 class="text-center ml-5">Ainda sem Funcionarios</h2>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->

    <section id="mensalidades" class="pricing justify-content-center">

      <!--  Section Title -->
      <div class="section-title" data-aos="fade-up">
        <h2>Mensalidades</h2>
        <h3>Veja aqui as opções de <span>Mensalidades</span></h3>
      </div><!-- End Section Title -->

      <div class="container" data-aos="zoom-in" data-aos-delay="100">

        @forelse($mensalidades as $mensalidade)
        @if ($loop->first)
        <div class="row g-4">
        @endif
        <div class="col-lg-4 ">
          <div class="mt-3">
            <div class="pricing-item featured">
              <h3><span>{{$mensalidade->dias}}</span>x Semana</h3>
              <div class="icon">
                <i class="bi bi-{{$mensalidade->dias}}-circle-fill"></i>
              </div>
              <h4>{{$mensalidade->preco}}<sup>€</sup><span> / Mês</span></h4>
              <div class="text-center"><a href="#" class="buy-btn">Adira</a></div>
            </div>
          </div>
        </div>
          @if (fmod($loop->iteration, 3) == 0)
            </div>
            <div class="row g-4">
          @elseif ($loop->last)    
            </div>
          @endif
        
        @empty  
          <h2 class="text-center ml-5">Ainda sem Mensalidades</h2>
        @endforelse

    </section><!-- End Pricing Section -->



    <section id="testemunhos" class="testimonials section-bg">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Testemunhos</h2>
          <h3>O Que <span>Dizem</span> Sobre Nós</h3>
          <p>Veja aqui as opiniões dos nossos clientes sobre o nosso estabelecimento</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">

            <div class="row">
              @forelse ($sugestoes as $sugestao)

              <div class="col-lg-6 pb-5">
                <div class="testimonial-item">
                  <img src="my_images/Guest.jpg" class="testimonial-img" alt="">
                  <h3>{{$sugestao->user->name}}</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    {{$sugestao->descricao}}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial-item -->
              @empty
              <h2 class="text-center ml-5">Ainda sem Opiniões</h2>
              @endforelse
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
@endsection