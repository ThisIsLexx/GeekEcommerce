<x-template titulo="Editar metodo de pago">
    <div class="wrapper">
        <br><br>
        <div class="container">
            
            <form action="/payment/{{$payment->id}}" method="POST" class="group-form">
                @csrf
                @method('PATCH')

                <h3>Editar método de pago</h3>
                <p>Todos los metodos de pago se encuentran almacenados de manera segura, y podrán ser utilizados al realizar pedidos</p>
                <hr>
                <label for="name">Nombre del titular:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Juan Alvarez..." value="{{$payment->name}}">
                @error('name')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                @enderror
                <div class="row">
                    <div class="col">
                        <label for="card_number">Número de la tarjeta:</label>
                        <input type="text" class="form-control" name="card_number" id="card_number" maxlength="16" value="{{$payment->card_number}}">
                        @error('card_number')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="col-2">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" name="cvv" id="cvv" maxlength="3" value="{{$payment->cvv}}">
                        @error('cvv')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-1">
                        <label for="expiration_date1">mes</label>
                        <input type="text" name="expiration_date1" id="expiration_date1" class="form-control" maxlength="2" value="{{$ex1}}">
                        @error('expiration_date1')
                            <div class="alert alert-warning">
                                !
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-1">
                        <label for="expiration_date2">año</label>
                        <input type="text" name="expiration_date2" id="expiration_date2" class="form-control" maxlength="2" value="{{$ex2}}">
                        @error('expiration_date2')
                            <div class="alert alert-warning">
                                !
                            </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="btn btn-secondary" href="/payment">Salir</a>
                </div>
            </form>

        </div>
    </div>
</x-template>