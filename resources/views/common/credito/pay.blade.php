@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Pagar Credito') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Pagar Credito</h1>
</div>
@stop

@section('content') <!--Contenido de la pagina-->
    <div>
        <form action="{{route('credito.buscar')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="param" placeholder="Buscar Credito" aria-label="Buscar Credito" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit"  id="button-addon2">Buscar</button>
              </div>
        </form>
    </div>
@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

