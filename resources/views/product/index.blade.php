<x-template titulo="Catalogo de productos">
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <h5 class="text-muted">Nuestros productos{{$filter == "" ? "" : ": $filter"}}</h5>
        </div>
        <div class="col-3"></div>
        <div class="col-1">
            <a class="btn btn-link" href="/">Quitar filtros</a>
        </div>
        <div class="col-4">
            <form class="group-form d-flex" action="/filtrarProducto" method="POST">
                @csrf
                <select class="form-control" name="filter" id="filter">
                    <option value="" selected disabled>Filtrar productos</option>
                    <option value="videojuego">Videojuegos</option>
                    <option value="series/peliculas">Series / Peliculas</option>
                    <option value="manga">Manga / Anime</option>
                </select>
                <input class="btn btn-secondary" type="submit" value="?">
            </form>
        </div>
    </div>
</div>

<hr>

<div class="container mt-5">

</div>
<div class="container">
    <div class="row g-3">
        @foreach($productos as $producto)
                {{-- <div class="col-md-4 mt-5">
                    <div class="card">
                        <img src="" class="card-img-top w-100">
                        <div class="cardbody">
                            <h2 class="card-title">{{$producto->category}}</h2>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">{{$producto->name}}</p>
                                <p class="card-text mr-4 text-success">${{$producto->prize}}.00</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 col-md-6 col-lg-4" style="margin-bottom:20px">
                    <div class="card">
                        <img class="img-card-top" src="{{\Storage::url($producto->img) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->name}}</h5>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">{{$producto->category}}</p>
                                <p class="card-text mr-4 text-success">${{$producto->prize}}.00</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="">
                                    <form action="/agregarCarrito" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$producto->id}}">
                                        <input class="btn btn-primary" type="submit" value="Carrito">
                                    </form>    
                                </a>
                                <a href="">
                                    <form action="/agregarFav" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{$producto->id}}">
                                        <input class="btn btn-success" type="submit" value="Favoritos">
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
         @endforeach
         
    </div>
</div>
<br><br><br><br>


<footer class="fixed-bottom text-center text-lg-start bg-light text-muted">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2022 Copyright:
        <a class="text-dark" href="/">Geek n' Chill</a>
      </div>

</x-template>