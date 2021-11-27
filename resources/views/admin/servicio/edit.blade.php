@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Editar Servicio') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="card mb-0">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
        <h1 class="col">Editar Servicio</h1>
    </div>
  </div>
</div>
@stop

@section('content') <!--Contenido de la pagina-->
<div class="col-lg-12 card mx-auto p-4">
    <form method="POST" action="{{route('servicios.update',$servicio->id) }}" class="mt-3">
        @method('PATCH')
        @include('admin.servicio._form',['btnText'=>'Guadar Cambios'])
    </form>
</div>
@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

