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
<div class="container">
    <div class="card mx-auto my-3 p-5">
        <div class="row">
            @if(!empty($vehiculo->images))
            <div class="col-12 col-lg-6 fotorama mx-auto" data-allowfullscreen="true" data-nav="thumbs">
                @foreach ($vehiculo->images as $image)
                <a href=""><img src="{{$vehiculo->path.$image}}" width="50px" height="50px"></a>
                @endforeach
            </div>
            @endif
        </div>
        <div class="btn-group col mt-4 mb-4 mx-auto" role="group" aria-label="">
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
        <table class="table">
                <thead class="thead">
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Año</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{$vehiculo->placa}}</th>
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->modelo}}</td>
                    <td>{{$vehiculo->anio}}</td>
                </tr>
                </tbody>
            </table>
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