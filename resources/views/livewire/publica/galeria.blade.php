<div class="container">
    @if (!$fotos->isEmpty())
    <section class="portfolio p-1">
        <div class="row portfolio-container justify-content-center">

                <div class="row  ms-5">
                    @foreach ($fotos as $foto)
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                        <img src="{{Storage::url($foto->imagem)}}" class="img-fluid" alt="">
                        <div class="portfolio-info p-2">
                            <h4>{{$foto->titulo}}</h4>
                        </div>
                        </div>
                    </div>
                    
                    @endforeach
            </div>
        </div>
    @else
    <h2 class="text-center ml-5">Ainda sem Fotos</h2>
    @endif
  
    </section>
</div>