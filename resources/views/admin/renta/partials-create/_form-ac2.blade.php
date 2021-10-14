<form class="form-inline mb-4 mt-4" method="POST" action="{{route('renta.buscarvc')}}">
    @csrf
    <div class="input-group-prepend float-right">
        <input type="text" name="criterio" class="form-control mx-1">
        <input type="text" name="cliente_id" hidden class="form-control mx-1" value="{{$cliente->id ?? 0}}">
        <input type="text" name="vehiculo_id" hidden class="form-control mx-1" value="{{$vehiculo->id ?? 0}}">
        <input type="text" name="type" hidden class="form-control mx-1" value="vehiculo">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary" type="button">Buscar Vehiculo</button>
        </div>
    </div>
</form>
<div id="accordion-2">
    <div class="card ">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    Mostrar Vehiculo
                </button>
            </h5>
        </div>

        <div id="collapseTwo" class="collapse @if($vehiculo->id) show @endif" aria-labelledby="headingTwo" data-parent="#accordion-2">
            <div class="card-body col-">
                @if ($vehiculo->id)
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Placa: {{$vehiculo->placa}}</li>
                                <li>Marca: {{$vehiculo->marca}}</li>
                                <li>Poliza: {{$vehiculo->n_pol_s}}</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <img src="{{!empty($vehiculo->images) ? $vehiculo->path.$vehiculo->images[0]
                                : 'img/car.png'}}" alt="imagen del vehiculo" width="100%" height="90%">
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