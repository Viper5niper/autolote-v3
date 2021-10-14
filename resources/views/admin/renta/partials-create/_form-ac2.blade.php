<form class="form-inline mb-4 mt-4">
    @csrf
    <div class="input-group-prepend float-right">
        <input type="text" class="form-control mx-1" aria-label="Text input with segmented dropdown button">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Buscar Cliente</button>
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

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-2">
            <div class="card-body col-">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>Placa:</li>
                            <li>Marca:</li>
                            <li>Poliza:</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <img src="/img/car.png" alt="imagen del vehiculo" width="100%" height="90%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>