@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Editar Credito') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Editar Credito</h1>
</div>

@stop

@section('content') <!--Contenido de la pagina-->

@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

