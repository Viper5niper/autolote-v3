@extends('adminlte::page')

@section('title', 'Vehiculo')

@section('content_header')
<!--Contenido de cabecera-->
<div class="card">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Informacion del Vehiculo</h1>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="card col-lg-12 mx-auto p-4 mt-n3">
    <div class="row">
        <div class="col-md-12 btn-group mb-3" role="group">
            <a class="btn btn-md btn-outline-success" href="{{route('venta.vehiculo',$vehiculo->id)}}">
                Vender
            </a>
            <a class="btn btn-md btn-outline-success" href="{{route('renta.create',$vehiculo->id)}}">
                Rentar
            </a>
        @if(auth()->user()->role === 1)
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Editar
            </a>
            <a class="btn btn-md btn-outline-danger" data-toggle="modal" data-target="#DeletedModal">
                Eliminar
            </a>
            @endif
        </div>
        @if(!empty($vehiculo->images))
        <div class="col-md-6 fotorama" data-allowfullscreen="true" data-nav="thumbs">
            @foreach ($vehiculo->images as $image)
            <a href=""><img src="{{$vehiculo->path.$image}}"></a>
            @endforeach
        </div>
        @endif
        <div class="col-md-6">
            <table class="table table-borderless">
                <tr>
                    <td><h5><b>Marca</b></h5></td>
                    <td><h5>{{$vehiculo->marca}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Modelo</b></h5></td>
                    <td><h5>{{$vehiculo->modelo}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Placa</b></h5></td>
                    <td><h5>{{$vehiculo->placa}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Color</b></h5></td>
                    <td><h5>{{$vehiculo->color}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Año</b></h5></td>
                    <td><h5>{{$vehiculo->anio}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Tipo</b></h5></td>
                    <td><h5>{{$vehiculo->tipo}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Capacidad</b></h5></td>
                    <td><h5>{{$vehiculo->capacidad}}</h5></td>
                </tr>
                <tr>
                    <td><h5><b>Calidad</b></h5></td>
                    <td><h5>{{$vehiculo->calidad}}</h5></td>
                </tr>
            </table>
        </div>
    </div>

        
</div>



@include('/partials/_modal-deleted',
['modal_title'=> 'Eliminar Vehiculo '.$vehiculo->placa,
'modal_message'=>'Esta seguro que desea eliminar el vehiculo?','btnTipo'=>'danger',
'ruta'=>route('vehiculo.destroy',$vehiculo->id)])
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<script>

</script>
@stop