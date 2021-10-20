@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content')

<div class="container">
    
    <div class="row">
        
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            @include('partials._status')
            <h2>Crear Usuario</h2>
            @if(!isset($empleado))
            <form class="form-inline mb-4" method="POST" action="{{route('empleado.buscaremp')}}">
                @csrf
                <div class="input-group-prepend float-right">
                    <input type="text" name="criterio" class="form-control mx-1">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary" type="button">Buscar Empleado</button>
                    </div>
                    <div class="input-group-append">
                        <a href="{{route('empleado.create')}}" onclick="window.open(this.href, 'mywin',
                        'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" class="btn btn-outline-secondary mx-2" type="button">Crear Empleado</a>
                    </div>
                </div>
            </form>
           
            @endif
           
            <form method="POST" action="{{ route('user.store') }}" class="mt-3">
                @include('admin.usuario._form',['usuario'=> $usuario ,'btnText'=>'Registrar Usuario','empleado'=>isset($empleado->id) ? $empleado : ''])
            </form>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop