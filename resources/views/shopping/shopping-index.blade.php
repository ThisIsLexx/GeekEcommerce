<x-template titulo="Mi carrito">
    <div class="wrapper">
        <br><br>
        <div class="container">
            <h3>Mi Carrito</h3>
            <p class="text-muted">Todos los productos que se encuentran aqui han sido agregados por el usuario.</p>
            <hr>

            <div class="row">
                <div class="col-10">
                    Nombre del producto:
                </div>
                <div class="col-2">
                    precio:
                </div>
            </div>

            @foreach()

            @endforeach
            
        </div>
    </div>
</x-template>