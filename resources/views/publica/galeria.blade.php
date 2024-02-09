@extends('layouts.base')
@section('content')
<section class="team">
    <div class="section-title">
        <h2>Galeria</h2>
        <h3>Fotos de <span>PepaGym</span></h3>
    </div>

  <div class="container">
    @foreach ($fotos as $foto)
        {{-- @if ($loop->first)
        <div class="d-flex">
        @endif --}}
        <div class="col-xl-3 col-lg-4 col-md-6 me-3 imagem">
          <div class="member">
            <img src="{{$foto->imagem}}" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4>{{$foto->titulo}}</h4>
              </div>
            </div>
          </div>
      </div>
      {{-- @if (fmod($loop->iteration, 4) == 0)
        </div>
        <div class="d-flex">
      @elseif ($loop->last)
        </div>
      @endif --}}
    @endforeach
  </div> 
</section>
@endsection