@extends('adminlte::page')

@section('title', 'Venta de Vehiculo')

@section('content')

@include('partials._status')

<div class="container">
    <div class="row">
        <div class="col-lg-12  card d-flex justify-content-center mx-auto my-3 p-5">
            <h2>Vender Vehiculo</h2>
            <hr>
            <div id="ac1">
                @include('common.venta.partials_create._form-ac1')
            </div>
            <div id="ac2">
                @include('common.venta.partials_create._form-ac2')
            </div>
            <div id="form">
                <form action="{{route('store.venta.vehiculo')}}" method="POST">
                    @include('common.venta.partials_create._form',['btnText'=>'Registrar Venta'])
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="/js/utilities.js"></script>
@stop