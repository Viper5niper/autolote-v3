<form class="form-row mb-4" method="POST" action="{{route('venta.buscarvc')}}">
    @csrf
    <div class="input-group float-right">
    <div class="input-group-preppend">
            <a href="{{route('cliente.create')}}" onclick="window.open(this.href, 'mywin',
            'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" class="btn btn-outline-secondary" type="button">Crear Cliente</a>
        </div>
        <input type="text" name="criterio" class="form-control">
        <input type="text" name="cliente_id" hidden class="form-control mx-1" value="{{$cliente->id ?? 0}}">
        <input type="text" name="vehiculo_id" hidden class="form-control mx-1" value="{{$vehiculo->id ?? 0}}">
        <input type="text" name="type" hidden class="form-control mx-1" value="cliente">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary" type="button">Buscar Cliente</button>
        </div>
    </div>
</form>
<div id="accordion">
    <div class="">
        <div class="" id="headingOne">
            <h5 class="mb-4">
                <button class="btn btn-outline-primary col-md-12" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Mostrar Cliente
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse @if($cliente->id) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="">
                @if ($cliente->id)
                <ul>
                    <li>Nombre: {{$cliente->nombre}}</li>
                    <li>Apellidos: {{$cliente->apellido}}</li>
                </ul>
                {{-- @php
                    print_r($cliente)
                @endphp --}}
                @else
                    <p>Por favor busque un cliente</p>
                @endif
                
            </div>
        </div>
    </div>
</div>