<x-template titulo="direcciones">
<div class="wrapper">
    <br><br>
    <div class="container">
        <h3>Mis direcciones</h3>
        <hr>
        <div class="container">
            @if(sizeof($addresses) < 1)
                <h4>Aun no has registrado ninguna dirección!</h4>
            @else
                @foreach($addresses as $address)
                <div class="card">
                    <div class="card-header">
                        {{$address->city}}, {{$address->state}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$address->street_address}} - {{$address->name}} {{$address->last_name}}</h5>
                        <p class="card-text">Código postal: {{$address->zip}} - Telefono: {{$address->tel}}</p>
                        <div class="text-center">
                            <div class="container">
                                <div class="text-center">
                                    <form action="/address/{{$address->id}}" method="POST">
                                        @csrf  
                                        @method('DELETE')

                                        <a href="/address/{{$address->id}}/edit" class="btn btn-primary">Editar</a>  
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
                    Nueva dirección
                </div>
                <div class="card-body">
                    <h5 class="card-title">Agrega una nueva dirección</h5>
                    <div class="text-center">
                        <div class="container">
                            <div class="text-center">
                                <a href="/address/create" class="btn btn-primary">+</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</x-template>