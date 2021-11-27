@extends('adminlte::page')

@section('title', 'Devolver')

@section('content_header')
<div class="card mb-0">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1>Devolver Vehiculo Rentado</h1>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="col-lg-12 card mx-auto p-4">
  <div class="table">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th scope="col">Placa</th>
          <th scope="col">Cliente</th>
          <th scope="col">Fecha de Renta</th>
          <th scope="col">Fecha Devolucion</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($renta->id))

            <tr>
              <th scope="row">{{$renta['json_array']['Vehiculo']['placa']}}</th>
              <td>{{$renta['json_array']['Cliente']['nombre']." ".$renta['json_array']['Cliente']['apellido']}}</td>
              <td>{{$renta['json_array']['inicio']}}</td>
              <td>{{$renta['json_array']['final']}}</td>
              <td>{{$renta['estado'] === 1 ? "Activa" : "Finalizada"}}</td>
            </tr>

      @else
          <tr>
            <th scope="row" colspan="6">No hay rentas realizadas</th>
          </tr>
      @endif


      </tbody>
    </table>
  @php 

    $total = 0;
    $factura = false;
    $hoy=new DateTime();$hoy->settime(0,0);//se toma la fecha de hoy a las 0 horas
    $final = new DateTime($renta['json_array']['final']);//se toma la fecha de entrega del vehiculo
    $ndias=0.00;$mora=0.00;//se pone por default 0 dias de retraso y 0 de mora
    $msg = "Devolver";//mensaje segun si hay mora o no XD
    
    if($hoy>$final){//si la fecha de hoy sobrepasa la fecha de entrega entonces entrego tarde
      $diferencia=$final->diff($hoy);//se saca cuantos dias de retraso tiene
      $ndias=$diferencia->days;//se saca la diferencia en dias
      $mora=$renta['monto'] * 0.03;//la mora es equivalente al 3% del monto original
      $mora = $mora*$ndias;$mora=round($mora, 2);//y se multiplica por cada dia de mora
      $msg="Devolver y Facturar Mora";//pa que cambie el texto diciendo que tambien se facturara en casod e haber mora
      $factura = true;
      $total = ($renta['monto'] * $ndias) + $mora;
    }

  @endphp
  <form action="{{route('renta.update',$renta->id)}}" method="POST">
    @csrf

    @method('PATCH')
    <input type="text" name="vehiculo_id" value="{{$renta['json_array']['Vehiculo']['id']}}" hidden>
    <input type="text" name="cliente_id" value="{{$renta['json_array']['Cliente']['id']}}" hidden>
    <input type="text" name="inicio" value="{{$renta['json_array']['inicio']}}" hidden>
    <input type="text" name="final" value="{{$renta['json_array']['final']}}" hidden>
    <input type="text" name="tipo" value="{{$renta['json_array']['tipo']}}" hidden>
    <input type="text" name="ncr" value="{{$renta['json_array']['ncr']}}" hidden>
    <input type="text" name="total" value="{{$total}}" hidden>
    <div class="form-row justify-content-center ">
      <div class="form-group col-md-4 first" >
          <label for="n_dias">Dias Retraso</label>
          <input type="number" readonly accept="any" name="n_dias" class="form-control @error('n_dias') is-invalid
          @enderror" id="n_dias" palceholder="$" value="{{$ndias}}" required>
          @error('n_dias')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group col-md-4 first">
          <label for="mora">Mora a Pagar</label>
          <input type="number" readonly name="mora" class="form-control @error('mora') is-invalid
          @enderror" id="mora" value="{{$mora}}">
          @error('mora')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      @if ($factura);
      <div class="form-group col-md-4 first">
        <label for="n_factura">N Factura</label>
        <input type="number" name="n_factura" class="form-control @error('n_factura') is-invalid
        @enderror" id="n_factura" >
        @error('n_factura')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      @endif
    </div>

    <div class="form-button pt-4"> <button type="submit"
        class="btn btn-primary btn-block btn-lg"><span>{{$msg}}</span></button>
    </div>
  </form>
    <!-- VAYA we aca creas un form que llame auna wea nose como manejan que desencadene el evento de guardar
      hace que tome el campo de mora y dias y cualquiera de los que ocupes en los de la factura de Rentas
      y haces algo primero evaluas si la mora es >0 si es verdadero entonces solo mandas a hacer un Update
    donde cambias el estado de R=renta a D=disponible  o como sea que manejen eso en la nueva DB
  y en caso de ser falso entonecs haces siempre ese update pero imprimis tambien una factura que sea igual que la de renta
  pero en lugar de monto ira mora y los dias del campo de aca. y eso seria todo  -->
  </div>
</div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
