@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1></h1>
@stop

@section('content')
<div class="container" style="margin-top: 250px;">
    <div class="row">
        <div class="col">
        <nav class="menu">
            <input checked="checked" class="menu-toggler" id="menu-toggler" type="checkbox"></input>
            <label for="menu-toggler"></label>
            <ul>
                <li class="menu-item">
                <a class="fas fa-fw fa-hand-holding" href="{{route('servicios')}}" data-toggle="tooltip" data-placement="top" title="Servicios"></a>
                </li>
                <li class="menu-item bi bi-mic-fill">
                <a class="fas fa-fw fa-dollar-sign" href="{{route('credito.pay')}}" data-toggle="tooltip" data-placement="top" title="Pago de cuotas"></a>
                </li>
                <li class="menu-item bi bi-mic-fill">
                <a class="fas fa-fw fa-car-side" href="{{route('renta')}}" data-toggle="tooltip" data-placement="top" title="Rentas"></a>
                </li>
                <li class="menu-item bi bi-mic-fill">
                <a class="fas fa-fw fa-car" href="{{route('vehiculo')}}" data-toggle="tooltip" data-placement="top" title="Vehiculos"></a>
                </li>
                <li class="menu-item bi bi-mic-fill">
                <a class="fas fa-fw fa-dollar-sign" href="{{route('creditos')}}" data-toggle="tooltip" data-placement="top" title="Creditos"></a>
                </li>
                <li class="menu-item bi bi-mic-fill">
                <a class="fa fa-calculator" href="{{route('calculadora')}}" data-toggle="tooltip" data-placement="top" title="Calculadora"></a>
                </li>
            </ul>
            </nav>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/stilo.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop