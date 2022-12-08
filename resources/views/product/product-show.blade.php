<x-template titulo="Mostrar {{$product->name}}">
    <div class="wrapper">
        <br><br>
        
        
        <div class="container">
            @if($product->img == false)
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->info}}</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Precio: {{$product->prize}} - En stock: {{$product->stock}}</small>
                </div>
                <hr>
                <div class="container">
                    <h4 class="text-center">Agregar imagen</h4>
                        <form action="/guardarArchivo/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" required type="file" name="archivo">
                                    <label class="custom-file-label" for="archivo">Elegir archivo...</label>
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" value="Guardar imagen">
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="btn btn-secondary" href="/product">Volver</a>
                        </div>
                        <br>
                </div>
            @else
                <div class="card">
                    <img class="card-img-top" src="{{\Storage::url($product->img) }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->info}}</p>
                    <hr>
                    <div class="text-center">
                        <a class="btn btn-primary" href="#">Agregar a favoritos</a>
                        <a href="">
                            <form action="/agregarCarrito" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input class="btn btn-primary" type="submit" value="Agregar al carrito">
                            </form>    
                        </a>
                    </div>

                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Precio: {{$product->prize}} - En stock: {{$product->stock}}</small>
                </div>
                <h4 class="text-center">Seleccionar una nueva imagen</h3>
                <form action="/editarArchivo/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="custom-file">
                            <input class="custom-file-input" required type="file" name="nuevoArchivo">
                            <label class="custom-file-label" for="nuevoArchivo">Elegir archivo...</label>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="Editar imagen">
                    </div>
                </form>
                
                <hr>
                <div class="container text-center">
                    <a href="">
                        <form action="/eliminarArchivo/{{ $product->id }}" method="POST">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Eliminar imagen">
                        </form>
                    </a>
                </div>
                <hr>
                    <a class="btn btn-secondary" href="/product">
                        Volver    
                    </a>
                @endif
        </div>

        </div>
    </div>


</x-template>