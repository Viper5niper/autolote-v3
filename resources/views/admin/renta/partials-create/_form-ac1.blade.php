<form class="form-inline mb-4" action="">
    @csrf
    <div class="input-group-prepend float-right">
        <select class="custom-select" id="inputGroupSelect04">
            <option selected>Seleccionar ...</option>
            <option value="dui">DUI</option>
            <option value="licencia">Licencia</option>
            <option value="passport">Pasaporte</option>
        </select>
        <input type="text" class="form-control mx-1" aria-label="Text input with segmented dropdown button">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Buscar Cliente</button>
        </div>
        <div class="input-group-append">
            <a href="{{route('cliente.create')}}" onclick="window.open(this.href, 'mywin',
            'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" class="btn btn-outline-secondary mx-2" type="button">Crear Cliente</a>
        </div>
    </div>
</form>
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Mostrar Cliente
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <ul>
                    <li>Nombre: Juan Camanei</li>
                    <li>Apellidos: Morales Mora</li>
                </ul>
            </div>
        </div>
    </div>
</div>