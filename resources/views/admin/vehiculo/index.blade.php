@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Vehiculos') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->
<div class="d-flex p-2 bd-highlight" >
    <div class="col-lg-12">
        <h1 class="float-left">Vehiculos</h1>
        <a class="btn btn-md btn-success float-right" href="{{route('vehiculo.create')}}">
        Crear nuevo vehiculo
        </a>
    </div>
</div>
@if(isset($message))
<div class="alert alert-success alert-dismissible fade show mp-2 mb-2" role="alert">
    <strong>{{$message}}</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@stop

@section('content') <!--Contenido de la pagina-->
<div class="row d-flex justify-content-center mx-auto">
    @forelse($vehiculos as $vehiculoItem)
        <div class="card mx-2" style="width: 18rem;">
            <img src="/img/car.png" class="card-img-top" alt="imagen de auto">
            <div class="card-body">
                <h5 class="card-title">{{$vehiculoItem->placa}}</h5>
                <p class="card-text">
                    <ul>
                        <li>{{$vehiculoItem->marca}}</li>
                        <li>{{$vehiculoItem->modelo}}</li>
                        <li>{{$vehiculoItem->anio}}</li>
                    </ul>
                </p>
                <div class="btn-group d-flex " role="group" aria-label="">
                    <a href="{{route('vehiculo.show',$vehiculoItem->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('vehiculo.show',$vehiculoItem->id)}}" class="btn btn-outline-success">Rentar</a>
                    <a href="{{route('vehiculo.show',$vehiculoItem->id)}}" class="btn btn-outline-success">Vender</a>
                </div>
                
            </div>
        </div>
    @empty
        <p>No hay vehiculos registrados</p>
    @endforelse 
</div>
<div class="d-flex justify-content-center mb-5">
    {{$vehiculos->links()}}
</div>
@endsection

