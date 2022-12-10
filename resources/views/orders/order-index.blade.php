<x-template titulo="Gestor de ordenes">
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
    <div class="container">
        <h5>Por el momento esta función no esta implementada! :(</h5>
        <h5>--><a href="/">Volver al catalogo</a></h5>
        <p class="text-muted">Nada que ver por aquí...</p>
    </div>
</x-template>
