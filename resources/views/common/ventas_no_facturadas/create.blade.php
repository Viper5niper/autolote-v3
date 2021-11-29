@extends('adminlte::page')

@section('title', 'Bienvenid@')

@section('content_header')
<div class="card">
  <div class="mx-3 mt-1 mb-1 pb-3">
    <div class="row mt-3">
      <h1 class="col">Facturar Servicio</h1>
    </div>
  </div>
</div>
@stop

@section('content')
@include('partials._status')
<div class="container">
    <div class="row">
        <div class="col-12 card pt-3 pb-3 mt-n3">
            @php
              $heads = [
                
                'Codigo',
                'Area de Servicio',
                'Precio',
                'Descuento',
                'Precio Descuento',
                'Descripcion',
                'Opcion',
              ];
    
              $config = [
                'language' => [
                      "url" => "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json",
                      "paginate" => [
                      "next" => '»',
                      "previous" => '«'
                      ],
                ],
    
                'order' => [[1, 'asc']],
              ];
            @endphp
            
            <x-adminlte-datatable id="servicios" :heads="$heads" :config="$config" head-theme="light" striped hoverable beautify>                
              @foreach($servicios as $servicio)
                <tr id="{{$servicio->cod}}">          
                  <td>{{$servicio->cod}}</td>
                  @switch ($servicio->area_empresa)
                      @case ('R')
                        <td>Rentas</td>
                        @break
                      @case ('STA')
                        <td>Taller Automotriz</td>
                        @break
                      @case ('STP')
                        <td>Taller de Pintura</td>
                        @break
                      @case ('SC')
                        <td>CarWash</td>
                        @break;
                      @case ('O') 
                        <td>Otros</td>
                        @break;
                      @default
                        <td>**--**</td>
                  @endswitch
                  
                  <td>${{$servicio->precio}}</td>
                  <td>{{($servicio->descuento * 100)}}%</td>
                  <td>${{($servicio->precio - ($servicio->precio * $servicio->descuento))}}</td>
                  <td>{{$servicio->descripcion}}</td>
                  <td><nobr>
                    <a onclick="addService('{{$servicio->cod}}');" class="btn btn-outline-info"><i class="fas fa-plus"></i></a>
                  </nobr></tr>
              @endforeach
            </x-adminlte-datatable>               
          </div>
        
          <input class="array" type="hidden" id="data-chart" name="data" value="{{ $servicios }}">
        <div class="col-12 card pt-3 pb-3">
            <form action="{{route('ventanf.store')}}" method="POST">
                @csrf
            <div class="input-group">
                <input class="form-control mx-1" type="text" name="nombre" id="" placeholder="Nombre" required> 
                <input class="form-control mx-1" type="text" name="apellido" id="" placeholder="Apellido" required>
                <input class="form-control mx-1" type="text" name="doc" id="" placeholder="DUI" required>
                <input class="form-control mx-1" type="text" name="placa" id="" placeholder="Placa" required>
                <input class="array" type="hidden" id="data-db" name="servicios" value="" required>
            </div>
            <div class="mt-3 row mx-1">
              <button name="" id="" class="btn btn-primary col-lg-6" href="#" role="button" >Guardar Venta</button>
              <a name="" id="" class="btn btn-danger col-lg-6" href="#" role="button" onclick="removeAllServices()">Cancelar</a>
            </div>
            </form>
            <table class="table table-bordered mt-4" id="carrito">
                <thead>
                  <tr>
                    <th scope="col">Cant.</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">P.U</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody id="tbody_carrito">
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">Subtotal</td>
                        <td class="align-middle" id="subtotal">$ 0</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right" >Descuentos</td>
                        <td class="align-middle" id="desc">$ 0</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">Total</td>
                        <td class="align-middle" id="total">$ 0</td>
                    </tr>
                </tfoot>
              </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/imask"></script>
    <script src="/js/carrito_servicios.js"></script>
@stop