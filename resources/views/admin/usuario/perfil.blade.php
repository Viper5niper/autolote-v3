@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
@if (!empty($message))
@include('partials._message-alert')
@endif
<!--Contenido de cabecera-->
<div class="card">
    <div class="d-flex p-2 bd-highlight mt-2">
        <div class="col-lg-12">
            <div class="float-left mb-3">
                <h1>Perfil de Usuario</h1>
            </div>
            <div class="btn-group float-right" role="group" aria-label="">
                @if (empty($usuario->empleado->id))
                    <a class="btn btn-md btn-outline-success" >
                        Editar
                    </a>
                @else
                    <a class="btn btn-md btn-outline-success" href="{{route('perfil.edit',[$usuario->id])}}">
                        Editar
                    </a>    
                @endif
                <a class="btn btn-md btn-outline-success" href="{{route('perfil.reset')}}">
                    Cambiar Contrase&ntilde;a
                </a>
            </div>
        </div>
    </div>
</div>

@stop

@php
   
@endphp
@section('content')
<div class="container">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{!empty($usuario->empleado->images) ? $usuario->empleado->path.$usuario->empleado->images[0]
                            : '/img/profile.png'}}" alt="Admin" class="rounded-circle"
                            width="150">
                        <div class="mt-3">
                            <h5>{{$usuario->name}}</h5>
                            <p class="text-secondary mb-1">{{$usuario->email}}</p>
                            <p class="text-muted font-size-sm"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nombres</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$usuario->empleado->nombre}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Apellidos</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$usuario->empleado->apellido}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Telefono</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$usuario->empleado->telefono}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Celular</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$usuario->empleado->celular}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Direccion</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$usuario->empleado->direccion}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Profesion u Oficio</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$usuario->empleado->profesion}}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop