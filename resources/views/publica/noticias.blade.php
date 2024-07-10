@extends('layouts.base')
@section('content')
<section>

    <div class="section-title">
        <h2><span>Noticias</span></h2>
        <h3>Tudo Novo Sobre <span>PepaGym</span></h3>
      </div>
<div class="container">
    
        @forelse ($noticias as $noticia)
          <div class="card noti">
                <img src="{{Storage::url($noticia->imagem)}}" style="height: 230px; object-fit: cover;object-position: 20% 10%;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <h5 class="card-title">{{$noticia->titulo}}</h5>
                    <h6 class="text-decoration-underline">{{$noticia->created_at->format('d/m/Y')}}</h6>
                    </div>
                <p class="card-text">{{$noticia->descricao}}</p>
                </div>
        </div>
        @empty
          <h2 class="text-center ml-5">Ainda sem Noticias</h2>
        @endforelse
    
</div>
</section>
@endsection