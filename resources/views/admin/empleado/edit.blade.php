@extends('adminlte::page')

@section('title', 'Editar Empleado')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">
            <h2>Editar Empleado</h2>
            <form class="form-horizontal" method="POST" action="{{ route('empleado.update',[$empleado->id])}}"
                enctype="multipart/form-data">
                @method('PATCH')
                @include('admin.empleado._form',['btnText'=>'Guardar Cambios','empleado'=>$empleado])
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop