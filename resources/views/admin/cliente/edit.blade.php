@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="card mb-0">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Editar informacion</h1>
    </div>
  </div>
</div>
@stop


@section('content')

@if (isset($success))
<x-adminlte-alert theme="success" title="Exito!">
    Cliente registrado!
</x-adminlte-alert>
@endif
<div class="col-lg-12 card mx-auto p-4">
    <form method="POST" action="{{ route('cliente.update', [$cliente->id]) }}" class="mt-3">
        @method('PUT')

        @include('admin.cliente._form',['cliente'=> $cliente])

        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
        <a class="btn btn-secondary" href="{{route('cliente')}}">Ir a Lista de clientes</a>
        
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/imask"></script>
    <script src="/js/utilities.js"></script>
@stop