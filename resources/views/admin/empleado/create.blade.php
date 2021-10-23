@extends('adminlte::page')

@section('title', 'Nuevo')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            <h2>Crear Empleado</h2>
            <form class="form-horizontal" method="POST" action="{{ route('empleado.store') }}" enctype="multipart/form-data">
                @include('admin.empleado._form',['btnText'=>'Registrar Empleado','message'=>$empleado])
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
@stop