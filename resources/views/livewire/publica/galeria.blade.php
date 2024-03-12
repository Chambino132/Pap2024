<div class="container">
    @if (!$fotos->isEmpty())
    <div class="row  ms-5">
        @foreach ($fotos as $foto)
        <div class="col-xl-3 col-lg-4 col-md-6 imagem bg-light" style="height: 200px">
            <div class="member bg-light col-sm-10">
                <img wire:click="$dispatch('openModal', {component: 'modals.show-image', arguments: {funcionario:{{$foto->id}}}})"
                    src="{{Storage::url($foto->imagem)}}" class="img-fluid w-100 bg-light" alt="">
                <div class="member-info">
                    <div class="member-info-content ">
                        <h4>{{$foto->titulo}}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <h2 class="text-center ml-5">Ainda sem Fotos</h2>
    @endif

</div>