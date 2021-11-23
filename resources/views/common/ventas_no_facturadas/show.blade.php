@extends('adminlte::page')

@section('title', 'Bienvenid@')

@section('content_header')
   <h1></h1>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 card pt-3 pb-3">
          <div>
            <input type="text" name="nombre" id="" value={{ $venta['json_array']['nombre'] }} readonly> 
            <input type="text" name="apellido" id="" value={{ $venta['json_array']['apellido'] }} readonly>
            <input type="text" name="doc" id="" value={{ $venta['json_array']['doc'] }} readonly>
            <input type="text" name="placa" id="" value={{ $venta['json_array']['placa'] }} readonly>
            
            @php
                $aux = json_encode($venta['json_array']);
            @endphp

            <form action="{{route('store.venta.servicio')}}" method="POST">
                @csrf
                <input class="array" type="hidden" id="data-db" name="servicios" value="{{$aux}}">
                <input type="text" name="n_factura" id="" placeholder="# factura">
                <input type="text" name="descripcion" id="" placeholder="descripcion">
                <select name="tipo" id="">
                    <option value="consumidor">Consumidor Final</option>
                    <option value="credito">Credito Fiscal</option>
                </select>
                <input type="text" name="ncr" id="" placeholder="ncr">
                <input type="text" name="id" id="" value={{ $venta['id'] }} hidden>
                <button name="" id="" class="btn btn-primary" role="button">Facturar</button>
            </form>
            
          </div>

            <table class="table table-bordered mt-4" id="carrito">
                <thead>
                  <tr>
                    <th scope="col">Cant.</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">P.U</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody id="tbody_carrito">
                @php
                    
                @endphp
                  @foreach ($venta['json_array']['servicios']['servicios'] as $item)
                  <tr>
                    <td scope="col">{{$item['cantidad']}}</td>
                    <td scope="col">{{$item['codigo']}}</td>
                    <td scope="col">{{$item['descripcion']}}</td>
                    <td scope="col">{{$item['precio_unitario']}}</td>
                    <td scope="col">{{$item['total']}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">Subtotal</td>
                        <td class="align-middle" id="subtotal">$ {{$venta['json_array']['servicios']['subtotal']}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right" >Descuentos</td>
                        <td class="align-middle" id="desc">$ {{$venta['json_array']['servicios']['desc']}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td class="align-middle" id="total">$ {{$venta['json_array']['servicios']['total']}}</td>
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