<x-template titulo="Editar dirección {{ $address->street_address }}">
    <div class="wrapper">
        <br><br>
        <div class="container">
            
            <form action="/address/{{$address->id}}" method="POST" class="group-form">
                @csrf
                @method('PATCH')

                <h3>Agregar una nueva dirección</h3>
                <p>La información será guardada para su posterior uso al momento de realizar pedidos.</p>

                <div class="row">
                    <div class="col">
                        <label for="state">Estado:</label>
                        <input type="string" name="state" id="state" class="form-control" value="{{ $address->state }}">
                        @error('state')
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="city">Ciudad:</label>
                        <input type="string" name="city" id="city" class="form-control" value="{{ $address->city }}">
                        @error('city')
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <label for="street_address">Dirección:</label>
                        <input type="string" name="street_address" id="street_address" class="form-control" value="{{ $address->street_address }}">
                        @error('street_address')
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="zip">Código postal:</label>
                        <input type="numeric" name="zip" id="zip" class="form-control" value="{{ $address->zip }}">
                        @error('zip')
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <label for="references">Referencias de la dirección:</label>
                <textarea name="references" id="references" class="form-control">{{ $address->references }}</textarea>
                @error('references')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                @enderror
                <hr>

                <div class="row">
                    <div class="col">
                        <label for="name">Nombre(s)</label>
                        <input type="string" name="name" id="name" class="form-control" value="{{ $address->name }}">
                        @error('name')
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="last_name">Apellido(s)</label>
                        <input type="string" name="last_name" id="last_name" class="form-control" value="{{ $address->last_name }}">
                        @error('last_name')
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
    
                <label for="tel">Teléfono (10 digitos):</label>
                <input type="tel" name="tel" id="tel" class="form-control" placeholder="333132..." value="{{ $address->tel }}">
                @error('tel')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                @enderror
                <hr>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Guardar Dirección">
                    <a class="btn btn-secondary" href="/address">Salir</a>
                </div>

            </form>

        </div>
    </div>


</x-template>