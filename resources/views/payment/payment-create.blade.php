<x-template titulo="Agregar metodo de pago">
    <div class="wrapper">
        <br><br>
        <div class="container">
            
            <form action="/payment" method="POST" class="group-form">
                @csrf

                <h3>Agregar método de pago</h3>
                <p>Todos los metodos de pago se encuentran almacenados de manera segura, y podrán ser utilizados al realizar pedidos</p>
                <hr>
                <label for="name">Nombre del titular:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Juan Alvarez..." value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                @enderror
                <div class="row">
                    <div class="col">
                        <label for="card_number">Número de la tarjeta:</label>
                        <input type="text" class="form-control" name="card_number" id="card_number" maxlength="16" value="{{old('card_number')}}">
                        @error('card_number')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="col-2">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" name="cvv" id="cvv" maxlength="3" value="{{old('cvv')}}">
                        @error('cvv')
                            <div class="alert alert-warning">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-1">
                        <label for="expiration_date1">mes</label>
                        <input type="text" name="expiration_date1" id="expiration_date1" class="form-control" maxlength="2" value="{{old('expiration_date1')}}">
                        @error('expiration_date1')
                            <div class="alert alert-warning">
                                !
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-1">
                        <label for="expiration_date2">año</label>
                        <input type="text" name="expiration_date2" id="expiration_date2" class="form-control" maxlength="2" value="{{old('expiration_date2')}}">
                        @error('expiration_date2')
                            <div class="alert alert-warning">
                                !
                            </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Guardar Método">
                    <a class="btn btn-secondary" href="/payment">Salir</a>
                </div>
            </form>

        </div>
    </div>
</x-template>