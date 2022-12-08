<x-template titulo="Mis favoritos">
    <div class="wrapper">
        <br><br>
        <div class="container">
            <h3>Mis Favoritos</h3>
            <p class="text-muted">Todos los productos fueron agregados a la sección mis favoritos por el usuarios.</p>
            <hr>
            @if(sizeof($productos) < 1)
                <h5>Aun no has agregado producto a tus favoritos! Regresa a navegar:</h5>
                <h5>--><a href="#">Volver al catalogo</a> :)</h5>
                <p class="text-muted">Asegurate de volver con algo de valor!</p>
                
            @else
                <div class="row">
                    <div class="col-8">
                        NOMBRE DEL PRODUCTO:
                    </div>
                    <div class="col-2">
                        ACCIONES:
                    </div>
                    <div class="col-2">
                        PRECIO:
                    </div>
                </div>

                @foreach($productos as $producto)
                    <br>    
                    <div class="row">
                        <div class="col-8 text-muted">
                            
                        </div>
                        <div class="col-2">
                            <a href="">
                                <form action="/eliminarFav" method="POST">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{$producto->id}}">
                                    <input type="submit" class="btn btn-danger" value="Quitar">
                                </form>
                            </a>
                        </div>
                        <div class="col-2 text-muted">
                            $.00
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-10 text-muted">Precio sin IVA:</div>
                    <div class="col-2 text-muted">$.00</div>
                </div>
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-1 text-center">IVA:</div>
                    <div class="col-2 text-muted">$.00</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-10">Precio con IVA:</div>
                    <div class="col-2 text-muted">$.00</div>
                </div>
            @endif

        </div>
    </div>
</x-template>