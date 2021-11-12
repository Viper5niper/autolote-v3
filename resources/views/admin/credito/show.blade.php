@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Credito') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Credito</h1>
    <div class="col">
        <a class="btn btn-md btn-success float-right" href="{{route('credito.pay',$info['credito']['id'])}}">
            Pagar Credito
        </a>
        <a class="btn btn-md btn-success float-right mr-2" onclick="imprimir()">
            Imprimir
        </a>
    </div>
</div>

@stop

@section('content') <!--Contenido de la pagina-->
    <div>
        {{--Aqui va la info del cliente, los dos deben quedar uno a la par 
            del otro y en responsive vehiculo debera bajar , alinear los parrafo uno izquierda y otro derecha--}}
        <div>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true"><p>Credito N: {{$info['credito']['id']}}</p><p>Fecha: {{$info['credito']['created_at']}}</p></li>
                <li class="list-group-item">Nombres: {{$info['cliente']['nombre']}}</li>
                <li class="list-group-item">Apellido: {{$info['cliente']['apellido']}}</li>
                <li class="list-group-item">Documento: {{$info['cliente']['doc']}}</li>
                <li class="list-group-item">Telefono: {{$info['cliente']['telefono']}}</li>
                <li class="list-group-item">Celular: {{$info['cliente']['celular']}}</li>
                <li class="list-group-item">Email: {{$info['cliente']['email']}}</li>
            </ul>
        </div>
        {{--aqui la info del vehiculo--}}
        <div>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true"><p>Informacion del Vehiculo</p></li>
                <li class="list-group-item">Placa: {{$info['vehiculo']['placa']}}</li>
                <li class="list-group-item">Marca: {{$info['vehiculo']['marca']}}</li>
                <li class="list-group-item">Modelo: {{$info['vehiculo']['modelo']}}</li>
                <li class="list-group-item">Año: {{$info['vehiculo']['anio']}}</li>
                <li class="list-group-item">Color: {{$info['vehiculo']['color']}}</li>
            </ul>
        </div>
    </div>
    {{-- Aqui va la tabla de las coutas pagadas --}}
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Letra</th>
                <th scope="col">Fecha</th>
                <th scope="col">Dias Facturados</th>
                <th scope="col">Mora</th>
                <th scope="col">Interes</th>
                <th scope="col">Abonado</th>
                <th scope="col">Nuevo Saldo</th>
            </tr>
        </thead>
        <tbody>
            
        @if(isset($info['credito']->json_array['historial_pagos']))
            @foreach ($info['credito']->json_array['historial_pagos'] as $pago)
                <tr>
                    <th scope="row">{{$pago->letra}}</th>
                    <td>{{$pago->fecha}}</td>
                    <td>{{$pago->dias}}</td>
                    <td>{{$pago->mora}}</td>
                    <td>{{$pago->interes}}</td>
                    <td>{{$pago->abonado}}</td>
                    <td>{{$pago->saldo}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
            </tr> 
        @endif

        </tbody>
    </table>
</div>
@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
<script type="text/javascript">
    function imprimir(){
        window.print();
    }
</script>
@stop
