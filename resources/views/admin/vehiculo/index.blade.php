@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Vehiculos') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="card">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Vehiculos</h1>
        <div class="col">
          <a class="btn btn-md btn-success float-right" href="{{route('vehiculo.create')}}">
                Crear nuevo vehiculo
          </a>
        </div>
    </div>
  </div>
</div>
@stop

@section('content') <!--Contenido de la pagina-->
<div class="row d-flex justify-content-center mx-auto mt-n3">
    @forelse($vehiculos as $vehiculoItem)
        <div class="card mx-2" style="width: 18rem;">
            <img src="{{!empty($vehiculoItem->images) ? $vehiculoItem->path.$vehiculoItem->images[0]
            : 'img/car.png'}}" 
            class="card-img-top rounded mx-auto d-block" alt="imagen de auto" style="height: 14rem;">
            <div class="card-body">
                <h4><b>{{$vehiculoItem->placa}}</b></h4>
                <p class="card-text mt-n2">
                    <ul>
                        <li><h5>{{$vehiculoItem->marca}}</h5></li>
                        <li><h5>{{$vehiculoItem->modelo}}</h5></li>
                        <li><h5>{{$vehiculoItem->anio}}</h5></li>
                    </ul>
                </p>
                <div class="btn-group d-flex " role="group" aria-label="">
                    <a href="{{route('vehiculo.show',$vehiculoItem->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('renta.create',$vehiculoItem->id)}}" class="btn btn-outline-success">Rentar</a>
                    <a href="{{route('venta.vehiculo',$vehiculoItem->id)}}" class="btn btn-outline-success">Vender</a>
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

