@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')

<!--Contenido de cabecera-->
<div class="card">
    <div class="d-flex p-2 bd-highlight mt-2">
        <div class="col-lg-12">
            <div class="float-left mb-3">
                <h1>Informacion del Empleado</h1>
            </div>
            <div class="btn-group float-right" role="group" aria-label="">
                <a class="btn btn-md btn-outline-success" href="{{route('empleado.edit',$empleado->id)}}">
                    Editar
                </a>
                <a class="btn btn-md btn-outline-danger" data-toggle="modal" data-target="#DeletedModal">
                    Eliminar
                </a>
            </div>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="container">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{!empty($empleado->images) ? $empleado->path.$empleado->images[0]
                            : 'img/profile.png'}}" alt="Admin" class="rounded-circle"
                            width="150">
                        <div class="mt-3">
                            <h5>{{$empleado->nombre." ".$empleado->apellido}}</h5>
                            <p class="text-secondary mb-1">{{$empleado->cargo}}</p>
                            <p class="text-muted font-size-sm">{{$empleado->area_empresa}}</p>
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
                            {{$empleado->nombre}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Apellidos</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->apellido}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Telefono</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->telefono}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Celular</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->celular}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Direccion</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->direccion}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">DUI</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->doc}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">NIT</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->nit}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">N ISSS</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->isss}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">N NUP</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->nup}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Profesion u Oficio</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->profesion}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Cargo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->cargo}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Asignado en</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$empleado->area_empresa}}
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@include('/partials/_modal-deleted',
['modal_title'=> 'Eliminar al empleado '.$empleado->nombre,
'modal_message'=>'Esta seguro que desea eliminar el empleado?','btnTipo'=>'danger',
'ruta'=>route('empleado.destroy',$empleado->id)])
@stop