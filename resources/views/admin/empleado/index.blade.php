@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Empleados') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Empleados</h1>
    <div class="col">
    <a class="btn btn-md btn-success float-right" href="{{route('empleado.create')}}">
        Crear nuevo empleado
    </a>
    </div>
</div>

@stop

@section('content') <!--Contenido de la pagina-->
<div class="row d-flex justify-content-center mx-auto">
    @forelse($empleados as $empleado)
        <div class="card mx-2" style="width: 18rem;">
            <img src="{{!empty($empleado->images) ? $empleado->path.$empleado->images[0]
            : 'img/car.png'}}" 
            class="card-img-top rounded mx-auto d-block" alt="imagen de auto" style="height: 14rem;">
            <div class="card-body">
                <h5 class="card-title">{{$empleado->nombre." ".$empleado->apellido}}</h5>
                <p class="card-text">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </p>
                <div class="btn-group d-flex " role="group" aria-label="">
                    <a href="{{route('vehiculo.create')}}" class="btn btn-info">Ver</a>
                    <a href="{{route('vehiculo.create')}}" class="btn btn-outline-success">Rentar</a>
                    <a href="{{route('vehiculo.create')}}" class="btn btn-outline-success">Vender</a>
                </div>
                
            </div>
        </div>
    @empty
        <p>No hay empleados registrados</p>
    @endforelse 
</div>
<div class="d-flex justify-content-center mb-5">
    {{$empleados->links()}}
</div>
@endsection

