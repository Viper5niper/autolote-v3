@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Credito') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Credito</h1>
    <div class="col">
    <a class="btn btn-md btn-success float-right" href="{{route('empleado.create')}}">
        Pagar Credito
    </a>
    </div>
</div>

@stop

@section('content') <!--Contenido de la pagina-->

@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

