@extends('adminlte::page')

@section('title', 'Factura')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 card d-flex justify-content-center mx-auto my-3 p-5">       
            <div id="app" class="col-11">
            <h2>Informacion de la Factura</h2>
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
              <div class="col-12">
                <h5>Descripcion: </h5>
                  <p>{{$factura->descripcion}}</p>
              </div>
            </div>
          
            <div class="row my-1">
              <table class="table table-borderless factura">
                <thead>
                  <tr>
                    <th>Cant.</th>
                    <th>Descripcion</th>
                    <th>Precio Unitario</th>
                    <th>Importe</th>
                  </tr>
                </thead>
                @switch($factura->area_factura)
                  @case('R')
                    @include('common.factura.partials._renta_table')  
                  @break

                  @case('V')
                    @include('common.factura.partials._venta_table')
                  @break

                  @case('LC')
                    @include('common.factura.partials._cuota_table')
                  @break

                  @case('O')
                    @include('common.factura.partials._servicios_table')
                  @break

                  @default
                    
                @endswitch
              </table>
            </div>
            <a class="btn btn-primary float-right" href="{{route('factura_print',$factura->id)}}">Imprimir</a>
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
  border-top: solid 3px #000;
  border-bottom: 3px solid #000;
  font-size: 20px;
  text-align: right;
}

.cond {
  border-top: solid 2px #000;
}
    </style>
@stop

@section('js')
  
@stop