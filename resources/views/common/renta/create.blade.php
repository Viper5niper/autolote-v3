@extends('adminlte::page')

@section('title', 'Renta')

@section('content')

@include('partials._status')

<div class="container">
    <div class="row">
        <div class="col-lg-11  card d-flex justify-content-center mx-auto my-3 p-5">
            <h2>Renta Vehiculo</h2>
            <hr>
            <div id="ac1">
                @include('common.renta.partials-create._form-ac1')
            </div>
            <div id="ac2">
                @include('common.renta.partials-create._form-ac2')
            </div>
            <div id="form">
                <form action="">
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
<script>
   function fechafinal(){
    
    var Dias = Number.parseInt($('#renta_monto').val());
    var FechaI = new Date($('#renta_inicio').val());
    var FechaF = new Date();

    // Add 1 Day
    FechaF.setDate(FechaI.getDate() + Dias);
    FechaF = new Date().toISOString().split('T')[0];

    $('#renta_final').val(FechaF);
    console.log('aaaa');
   })
</script>
@stop