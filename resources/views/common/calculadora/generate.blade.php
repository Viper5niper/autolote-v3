@extends('adminlte::page')

@section('title', 'Presupuesto')

@section('content')

<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-8"></div>
        <div id="volver" class="col-lg-3">
            <input  onclick="imprimir();" value="Imprimir" class="btn btn-primary btn-block" id="boton">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            @include('partials._status')
            <p>
                <strong > Nombre del Cliente</strong>: {{$info->nombre." ". $info->apellido}}
            <br><br>
                <strong> Correo Electronico: </strong> {{$info->email}}<strong> Numero de Telefono: </strong> {{$info->telefono}}
            </p>
            <p>
                <strong>Datos de Vehiculo</strong>:
            </p>
            <p>
                <strong> Marca: </strong> {{$info->marca}}&nbsp;<strong> Modelo: </strong> {{$info->modelo}}&nbsp;
                <strong> A&ntilde;o: </strong> {{$info->anio}}&nbsp;<strong> Color: </strong>{{$info->color}}&nbsp;
                <strong> Numero de Placa : </strong>{{$info->placa}}&nbsp;
            </p>
            <p>
                <strong>Cotizaci&oacute;n:</strong>  Monto Otorgado : {{$info->monto}}&nbsp;&nbsp;Interes:
                {{$info->interes * 100}}%&nbsp;&nbsp; Fecha de Pago: {{$info->dpago}} de cada mes.
            </p>
            <div class="col-lg-10 d-flex mt-2">
                @include('common.calculadora._tabla')
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
<script type="text/javascript">
    function imprimir() {
        if (window.print) {
            window.print();
        } else {
            alert("La función de impresion no esta soportada por su navegador.");
        }
    }
</script>
@stop