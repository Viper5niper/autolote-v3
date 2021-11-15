@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Empleados') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="card">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Empleados</h1>
      <div class="col">
        <a class="btn btn-md btn-success float-right" href="{{route('empleado.create')}}">
            Crear nuevo empleado
        </a>
      </div>
    </div>
  </div>
</div>
@stop

@section('content') <!--Contenido de la pagina-->
<div class="row d-flex justify-content-center mx-auto">
    @forelse($empleados as $empleado)
        <div class="card mx-2" >
            <img style="width: 18rem;height:18rem" src="{{!empty($empleado->images) ? $empleado->path.$empleado->images[0]
            : 'img/profile.png'}}" 
            class="card-img-top rounded mx-auto d-block" alt="imagen de auto">
            <div class="card-body">
                <h5 class="card-title">{{$empleado->doc}}</h5>
                <p class="card-text">
                    <ul>
                        <li>{{$empleado->nombre}}</li>
                        <li>{{$empleado->apellido}}</li>
                        <li>{{$empleado->cargo}}</li>
                    </ul>
                </p>
                <div class="btn-group d-flex " role="group" aria-label="">
                    <a href="{{route('empleado.show',$empleado->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('empleado.create')}}" class="btn btn-outline-success">Modificar</a>
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
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

