<x-template titulo="Editar producto">
    <div class="wrapper">
        <br><br>
        <div class="container">
            <h3>Crear nuevo producto</h3>
            <hr>

            <form action="/product/{{$product->id}}" method="POST" class="form-group">
                @csrf
                @method('PATCH')

                <label for="name">Nombre del producto</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                @error('name')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                @enderror
                <div class="row">
                    <div class="col">
                        <label for="category">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option value="" selected disabled>Seleccione una</option>
                            <option value="videojuego" {{$product->category == "videojuego" ? "selected" : ""}}>videojuego</option>
                            <option value="series/peliculas" {{$product->category == "series/peliculas" ? "selected" : ""}}>series/peliculas</option>
                            <option value="manga" {{$product->category == "manga" ? "selected" : ""}}>manga</option>
                        </select>
                        @error('category')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="prize">Precio</label>
                        <input type="text" name="prize" id="prize" class="form-control" value="{{$product->prize}}">
                        @error('prize')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control" value="{{$product->stock}}">
                        @error('stock')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <label for="info">Descripci??n del producto</label>
                <textarea name="info" id="info" class="form-control">{{$product->info}}</textarea>
                @error('info')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                @enderror
                <hr>
                
                <div class="text-center">
                <br>
                    <input class="btn btn-primary" type="submit" value="Guardar">
                    <a class="btn btn-secondary" href="/product">Salir</a>
                </div>
            </form>

        </div>
    </div>
</x-template>