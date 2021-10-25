@extends('adminlte::page')

@section('title', 'Presupuesto')

@section('content')

<div class="container">
    
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
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">N&deg;</th>
                        <th scope="col">Cuota</th>
                        <th scope="col">Interes</th>
                        <th scope="col">Monto a Pagar</th>
                        <th scope="col">Nuevo Saldo</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                        $interes = 0;
                        $cuotas = 0;
                        $monto = 0;
                        $cuota = floor(($info->monto/$info->cuotas)/1);
                        $nmonto = $info->monto; 
                    @endphp
    
                    @for ($i = 0; $i < $info->cuotas; $i++)
                    
                    @php
                        $interess = $nmonto * $info->interes;
                        $cuota = floor($cuota);
                    @endphp
                
                    @if ($i != $info->cuotas)
                    @php
                        $interess = round($interess);
                        $nmonto = $nmonto-$cuota;
                        $montoapagar = $cuota + $interess;
                        $monto += $montoapagar;
                        $montoapagar = ceil($montoapagar);
                        $nmonto = floor($nmonto);
                        $interes += $interess;
                
                        $cuotas += $cuota;
                    @endphp
                    
                    <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>${{$cuota}}</td>
                        <td>${{$interess}}</td>
                        <td>${{$montoapagar}}</td>
                        <td>${{$nmonto}}</td>
                    </tr> 
                   
                    @endif
                    @endfor
                    </tbody>
                  </table>
            </div>
        </div>
        <div id="volver">
            <input  onclick="imprimir();" value="Imprimir" style="width: 200px;background: forestgreen;color: white;	font-size: 15px;font-family: 'Lucida Sans';	margin-top: 10px;border-radius: 5px; padding: 10px 50px;cursor: pointer;" id="boton"></div>
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