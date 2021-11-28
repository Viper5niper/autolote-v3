<form class="form-row mb-4 mt-4" method="POST" action="{{route('venta.buscarvc')}}">
    @csrf
    <div class="input-group float-right">
        <input type="text" name="criterio" class="form-control">
        <input type="text" name="cliente_id" hidden class="form-control mx-1" value="{{$cliente->id ?? 0}}">
        <input type="text" name="vehiculo_id" hidden class="form-control mx-1" value="{{$vehiculo->id ?? 0}}">
        <input type="text" name="type" hidden class="form-control mx-1" value="vehiculo">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary" type="button">Buscar Vehiculo</button>
        </div>
    </div>
</form>
<div id="accordion-2">
    <div class="">
        <div class="" id="headingTwo">
            <h5 class="mb-4">
                <button class="btn btn-outline-primary col-md-12" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    Mostrar Vehiculo
                </button>
            </h5>
        </div>

        <div id="collapseTwo" class="collapse @if($vehiculo->id) show @endif" aria-labelledby="headingTwo" data-parent="#accordion-2">
            <div class="card-body col-">
                @if ($vehiculo->id)
                    <div class="row">
                        <div class="col-lg-6 ml-n3">
                            <table class="table table-borderless">
                                <tr>
                                    <td><h5><b>Placa</b></h5></td>
                                    <td><h5>{{$vehiculo->placa}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Marca</b></h5></td>
                                    <td><h5>{{$vehiculo->marca}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Año</b></h5></td>
                                    <td><h5>{{$vehiculo->anio}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Modelo</b></h5></td>
                                    <td><h5>{{$vehiculo->modelo}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Color</b></h5></td>
                                    <td><h5>{{$vehiculo->color}}</h5></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <img class="float-right" src="{{!empty($vehiculo->images) ? $vehiculo->path.$vehiculo->images[0]
                                : '/img/car.png'}}" alt="imagen del vehiculo" width="80%" height="90%">
                        </div>
                    </div>
                    {{-- @php
                    print_r($vehiculo)
                    @endphp --}}
                @else
                <p>Por favor, busque un vehiculo.</p>
                @endif
               
                
            </div>
        </div>
    </div>
</div>