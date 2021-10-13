@extends('adminlte::page')

@section('title', 'Vehiculo')

@section('content_header')
<!--Contenido de cabecera-->
<div class="d-flex p-2 bd-highlight">
    <div class="col-lg-12">
        <div class="float-left mb-3">
            <h1>Informacion del Vehiculo</h1>
        </div>
        <div class="btn-group float-right" role="group" aria-label="">
            <a class="btn btn-md btn-outline-success" href="{{route('factura',$vehiculo)}}">
                Vender
            </a>
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Rentar
            </a>
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Editar
            </a>
            <a class="btn btn-md btn-outline-danger" data-toggle="modal" data-target="#ExampleModal">
                Eliminar
            </a>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="container">
    <div class="row">
        @if(!empty($vehiculo->images))
        <div class="col-12 col-lg-6 fotorama" data-allowfullscreen="true" data-nav="thumbs">
            @foreach ($vehiculo->images as $image)
            <a href=""><img src="{{$vehiculo->path.$image}}" width="144" height="96"></a>
            @endforeach
        </div>
        @endif
        <div class="col-12 col-lg-6">
            {{$vehiculo->placa}}
            {{$vehiculo->marca}}
            {{$vehiculo->modelo}}
            {{$vehiculo->anio}}
        </div>
    </div>
</div>

@include('/partials/_modal-message',
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