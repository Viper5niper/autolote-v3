@extends('adminlte::page')
<!--Extiende de la plantilla, para el menu-->

@section('title', 'Vehiculos')
<!--Titulo de la pagina-->

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!--CSS del menu-->
@stop

@section('content_header')
<!--Contenido de cabecera-->

@stop

@section('content')
<!--Contenido de la pagina-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 card d-flex justify-content-center mx-auto p-3">
            <h2>Facturar</h2>
            <form class="form-horizontal" method="POST" action="">
                
            </form>
        </div>
    </div>
</div>
@endsection