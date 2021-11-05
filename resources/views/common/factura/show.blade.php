@extends('adminlte::page')

@section('title', 'Factura')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 card d-flex justify-content-center mx-auto my-3 p-5">       
            <div id="app" class="col-11">
            <h2>Informacion de la Factura</h2>
        {{--    <div class="row my-3">
                <div class="col-10">
                <h1>Mil Pasos</h1>
                <p>Av. Winston Churchill</p>
                <p>Plaza Orleans 3er. nivel</p>
                <p>local 312</p>
                </div>
                <div class="col-2">
                <img src="~/images/Mil-Pasos_Negro.png" />
                </div>
            </div>--}}
          
            <hr />
          
            <div class="row fact-info mt-3">
              <div class="col-3">
                <h5>Cliente</h5>
                <p>
                {{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}
                </p>
              </div>
              <div class="col-3">
                <h5>Direccion</h5>
                <p>
                  {{$factura->payload['Cliente']['direccion']}}
                </p>
              </div>
              <div class="col-3">
                <h5>N° de factura</h5>
                <h5>Fecha</h5>
              </div>
              <div class="col-3">
                <h5>{{$factura->n_factura}}</h5>
                <p>{{$factura->created_at}}</p>
              </div>
            </div>
          
            <div class="row my-5">
              <table class="table table-borderless factura">
                <thead>
                  <tr>
                    <th>Cant.</th>
                    <th>Descripcion</th>
                    <th>Precio Unitario</th>
                    <th>Importe</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td>{{$factura->descripcion}}</td>
                    <td>{{ isset($factura->payload['p_unitario']) ? $factura->payload['p_unitario']: " "}}</td>
                    <td>{{$factura->payload['monto']}}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>PLACA: {{$factura->payload['Vehiculo']['placa']}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>MARCA: {{$factura->payload['Vehiculo']['marca']}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>MODELO: {{$factura->payload['Vehiculo']['modelo']}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total Factura</th>
                    <th>$ {{$factura->payload['monto']}}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <hr />
            <a class="btn btn-primary float-right" href="{{route('factura_renta',$factura->id)}}">Imprimir</a>
        </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .factura {
  table-layout: fixed;
}

.fact-info > div > h5 {
  font-weight: bold;
}

.factura > thead {
  border-top: solid 3px #000;
  border-bottom: 3px solid #000;
}

.factura > thead > tr > th:nth-child(2), .factura > tbod > tr > td:nth-child(2) {
  width: 300px;
}

.factura > thead > tr > th:nth-child(n+3) {
  text-align: right;
}

.factura > tbody > tr > td:nth-child(n+3) {
  text-align: right;
}

.factura > tfoot > tr > th, .factura > tfoot > tr > th:nth-child(n+3) {
  font-size: 24px;
  text-align: right;
}

.cond {
  border-top: solid 2px #000;
}
    </style>
@stop

@section('js')
  
@stop