<x-template titulo="Mis Metodos de pago">
<div class="wrapper">
    <br><br>
    <div class="container">
        <h3>Mis metodos de pago</h3>
        @if(session('success'))
            <div class="container-fluid alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <div class="container">
            @if(sizeof($payments) < 1)
                <h4>Aun no has registrado ningún metodo de pago!</h4>
            @else
                @foreach($payments as $payment)
                <div class="card">
                    <div class="card-header">
                        Titular: {{$payment->name}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Número de tarjeta: {{$payment->tarjeta()}}</h5>
                        <p class="card-text"></p>
                        <div class="text-center">
                            <div class="container">
                                <div class="text-center">
                                    <form action="/payment/{{$payment->id}}" method="POST">
                                        @csrf  
                                        @method('DELETE')

                                        <a href="/payment/{{$payment->id}}/edit" class="btn btn-primary">Editar</a>  
                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            @endif
            <div class="card">
                <div class="card-header">
                    Nuevo método de pago.
                </div>
                <div class="card-body">
                    <h5 class="card-title">Agregar nuevo método de pago</h5>
                    <div class="text-center">
                        <div class="container">
                            <div class="text-center">
                                <a href="/payment/create" class="btn btn-primary">+</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</x-template>