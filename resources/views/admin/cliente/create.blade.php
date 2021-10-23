@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear cliente</h1>
@stop

@section('content')

<form method="POST" action="{{ route('cliente.store') }}" class="mt-3">

    @include('admin.cliente._form',['cliente'=> $cliente])

      <button class="btn btn-primary" type="submit">Crear cliente</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/imask"></script>
    <script src="/js/utilities.js"></script>
@stop