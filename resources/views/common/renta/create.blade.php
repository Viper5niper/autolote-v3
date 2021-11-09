@extends('adminlte::page')

@section('title', 'Renta')

@section('content')

@include('partials._status')

<div class="container">
    <div class="row">
        <div class="col-lg-11 card mx-auto my-3 p-5">
            <h2>Renta Vehiculo</h2>
            <hr>
            <div class="col" id="ac1">
                @include('common.renta.partials-create._form-ac1')
            </div>
            <div class="col" id="ac2">
                @include('common.renta.partials-create._form-ac2')
            </div>
            <div class="col" id="form">
                <form action="{{route('renta.store')}}" method="POST">
                    @include('common.renta.partials-create._form',['btnText'=>'Registrar Renta'])
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