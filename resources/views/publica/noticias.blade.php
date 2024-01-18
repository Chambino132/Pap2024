@extends('layouts.base')
@section('content')
<section>

    <div class="section-title">
        <h2><span>Noticias</span></h2>
        <h3>Tudo Novo Sobre <span>PepaGym</span></h3>
      </div>
<div class="container">
      @foreach ($noticias as $noticia)
          @if ($loop->first)
            <div class="d-flex">
          @endif
          <div class="card noti" style="width: 33%">
                <img src="{{$noticia->imagem}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <h5 class="card-title">{{$noticia->titulo}}</h5>
                    <h6 class="text-decoration-underline">{{$noticia->data}}</h6>
                    </div>
                <p class="card-text">{{$noticia->descricao}}</p>
                </div>
        </div>
        @if (fmod($loop->iteration, 3) == 0)
            </div>
            <div class="d-flex">
        @elseif ($loop->last)
            </div>
        @endif
          
      @endforeach
</div>
</section>
@endsection