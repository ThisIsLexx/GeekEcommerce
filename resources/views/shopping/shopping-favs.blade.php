<x-template titulo="Mis favoritos">
    <div class="wrapper">
        <br><br>
        <div class="container">
            <h3>Mis Favoritos</h3>
            <p class="text-muted">Todos los productos fueron agregados a la sección mis favoritos por el usuarios.</p>
            <hr>
            @if(sizeof($productos) < 1)
                <h5>Aun no has agregado producto a tus favoritos! Regresa a navegar:</h5>
                <h5>--><a href="/">Volver al catalogo</a> :)</h5>
                <p class="text-muted">Asegurate de volver con algo de valor!</p>
                
            @else
                <div class="row g-3">
                    @foreach($productos as $producto)
                        <div class="col-12 col-md-6 col-lg-4" style="margin-bottom:20px">
                            <div class="card">
                                <img class="img-card-top" src="{{\Storage::url($producto->img) }}" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$producto->name}}</h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">{{$producto->category}}</p>
                                        <p class="card-text mr-4 text-success">${{$producto->prize}}.00</p>
                                    </div>
                                    <p class="card-text">{{$producto->info}}</p>
                                    <hr>
                                    <div class="text-center">
                                        <a href="">
                                            <form action="/eliminarFav" method="POST">
                                                @csrf
                                                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                                                <input type="submit" class="btn btn-danger" value="Quitar de favoritos">
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
            @endif

        </div>
    </div>
</x-template>