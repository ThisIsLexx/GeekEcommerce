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
                    <div class="card-body">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
                <h4 class="text-center">Imagen de referencia</h4>
                @foreach($platillo->archivos as $foto)
                    <img src="{{ \Storage::url($foto->ubicacion) }}" alt="Responsive image" class="img-fluid">
                @endforeach
                <hr>
                
                <h4 class="text-center">Seleccionar una nueva imagen</h3>
                <form action="/editarArchivo/{{ $platillo->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="custom-file">
                            <input class="custom-file-input" required type="file" name="nuevoArchivo">
                            <label class="custom-file-label" for="nuevoArchivo">Elegir archivo...</label>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="Guardar imagen">
                    </div>
                </form>
                
                <hr>
                <div class="container text-center">
                    <a href="">
                        <form action="/eliminarArchivo/{{ $platillo->id }}" method="POST">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Eliminar imagen">
                        </form>
                    </a>
                </div>
                <hr>
                    <a class="btn btn-secondary" href="/platillo">
                        Volver    
                    </a>
                @endif
        </div>

        </div>
    </div>


</x-template>