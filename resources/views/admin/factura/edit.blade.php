@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar informacion</h1>
@stop


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            <h2>Crear Vehiculo</h2>
            <form class="form-horizontal" method="POST" action="{{ route('vehiculo.update',[$vehiculo->id]) }}">
                @method('PATCH')
                @include('admin.vehiculo._form',['btnText'=>'Guardar Cambios','vehiculo'=>$vehiculo])
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