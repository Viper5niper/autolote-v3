@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar informacion</h1>
@stop


@section('content')

@if (isset($success))
<x-adminlte-alert theme="success" title="Exito!">
    Cliente registrado!
</x-adminlte-alert>
@endif

<form method="POST" action="{{ route('cliente.update', [$cliente->id]) }}" class="mt-3">
      @method('PUT')

      @include('admin.cliente._form',['cliente'=> $cliente])

      <button class="btn btn-primary" type="submit">Guardar Cambios</button>
      <a class="btn btn-secondary" href="{{route('cliente')}}">Ir a Lista de clientes</a>
      
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop