<x-template titulo="CRUD productos">
    <br><br>
    <div class="container">
        <h3 class="text-center">Registro de productos</h3>
    </div>

    @if(session('success'))
        <div class="container-fluid alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>

    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nombre del producto</th>
                    <th>Precio del producto</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th class="text-center">Acciones</th>
                    <th class="text-center"><a href="/product/create">Agregar</a></th>
                </tr>
            </thead>
            <tbody class="table-hover">
                @if(!empty($products))
                    @foreach($products as $product)
                        <tr>
                            <td><a href="/product/{{ $product->id }}">{{$product->name}}</a></td>
                            <td>${{$product->prize}}.00</td>
                            <td>{{$product->info}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->stock}}</td>
    
                            <td class="text-center">
                                <a class="btn btn-primary" href="/product/{{ $product->id }}/edit">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="">
                                    <form action="/product/{{ $product->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
        
                                        <input class="btn btn-danger" type="submit" value="Eliminar">
        
                                    </form>
                                </a>
                            </td>
    
                        </tr>
                        <img src="{{\Storage::url($product->img) }}" alt="">
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


</x-template>