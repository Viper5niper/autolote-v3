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
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Vender
            </a>
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Rentar
            </a>
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Editar
            </a>
            <a class="btn btn-md btn-outline-success" href="{{route('vehiculo.edit',['vehiculo'=>$vehiculo])}}">
                Eliminar
            </a>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
    <a href=""><img src="/img/frontier-1.jpg" width="144" height="96"></a>
    <a href=""><img src="/img/frontier-2.jpg" width="144" height="96"></a>
    <a href=""><img src="/img/frontier-3.jpg" width="144" height="96"></a>
    <a href=""><img src="/img/frontier-4.jpg" width="144" height="96"></a>
    <a href=""><img src="/img/frontier-5.jpg" width="144" height="96"></a>
    <a href=""><img src="/img/frontier-6.jpg" width="144" height="96"></a>
    <a href=""><img src="/img/frontier-7.jpg" width="144" height="96"></a>
</div>

<form method="" action="" class="mt-3">
    @csrf
    {{$vehiculo->placa}}
    {{$vehiculo->marca}}
    {{$vehiculo->modelo}}
    {{$vehiculo->anio}}
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<script>
    console.log('Hi!'); 
</script>
@stop