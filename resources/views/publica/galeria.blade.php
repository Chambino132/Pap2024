@extends('layouts.base')
@section('content')
<section class="team">
  <div class="section-title">
    <h2>Galeria</h2>
    <h3>Fotos de <span>PepaGym</span></h3>
  </div>

  <livewire:publica.galeria :fotos="$fotos">
</section>
@endsection