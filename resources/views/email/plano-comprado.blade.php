@extends('layouts.email')
@section('content')

    <h2 class="text-slate-50">O Cliente {{$data['nome']}} acabou de efetuar a compra de um Plano de Treino</h2>

    <p class="mt-2 leading-loose text-slate-50">
        Clique no botão para confirmar a compra
    </p>
    <button class="px-6 py-2 mt-4 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        <a href="{{route('planos', [$data['cliente_id'], $data['plano_id']])}}">Analisar Compra</a>
    </button>
@endsection
