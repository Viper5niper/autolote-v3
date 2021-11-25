@extends('adminlte::page')

@section('title', 'Devolver')

@section('content_header')
    <h1>Devolver Vehiculo Rentado</h1>
@stop

@section('content')

<div class="table-responsive">
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
  }

@endphp
<form action="{{route('renta.update',$renta->id)}}" method="POST">
  @csrf
  @method('PATCH')
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
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
  </div>

  <div class="form-button pt-4"> <button type="submit"
      class="btn btn-primary btn-block btn-lg"><span>{{$msg}}</span></button> </div>
  </div>
</form>
  <!-- VAYA we aca creas un form que llame auna wea nose como manejan que desencadene el evento de guardar
    hace que tome el campo de mora y dias y cualquiera de los que ocupes en los de la factura de Rentas
    y haces algo primero evaluas si la mora es >0 si es verdadero entonces solo mandas a hacer un Update
  donde cambias el estado de R=renta a D=disponible  o como sea que manejen eso en la nueva DB
y en caso de ser falso entonecs haces siempre ese update pero imprimis tambien una factura que sea igual que la de renta
pero en lugar de monto ira mora y los dias del campo de aca. y eso seria todo  -->
</div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
