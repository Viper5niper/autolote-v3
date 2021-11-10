@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Pagar Credito') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Pagar Credito</h1>
</div>
@stop

{{-- Hacer lo siguiente, crear un if que se va encargar de contar cuantos creditos se vienen, si viene mas de uno 
    quiere decir que se busco por cliente y el cliente tiene mas de un credito, si no quiere decir que se 
    busco el numero de credito directamente por lo que se podra cargar sin problema, si viene mas de un
    credito, debemos lanzar un modal que nos permita seleccionar el credito que se va facturar, mostrando 
    informacion general para poder decidir y recargaremos la vista con el id del credito seleccionado, solo
    debemos averiguar como lanzar el modal --}}

@section('content') <!--Contenido de la pagina-->
 
<div>
    <form action="{{route('credito.buscar')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="param" placeholder="Buscar Credito" aria-label="Buscar Credito" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit"  id="button-addon2">Buscar</button>
          </div>
    </form>
</div>

@if(empty($info['credito']) || is_countable($info['credito']))
    @include('common.credito.partials._lista_creditos')
@else

<div>
    <p>Nombre:  {{$info['cliente']->nombre." ".$info['cliente']->apellido}}</p>
    <p>#Credito: {{$info['credito']->id}}</p> {{-- esta parte carga el numero de credito y el nombre de la persona --}}
</div>
<form action="{{route('creditos.update',["credito" => $info['credito']->id])}}" method="POST" class="form-horizontal">
    @csrf
    @method('PATCH')
<div class="form-row">
    <div class="form-group col-md-4 first" id="n_couta_div">
        <label for="n_factura"># Factura</label>
        <input type="number" accept="any" name="n_factura" class="form-control @error('n_factura') is-invalid 
        @enderror" id="n_factura" palceholder="$" value="{{old('n_factura')}}">
        @error('n_factura')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-8 first">
        <label for="descripcion">Descripcion</label>
        <input type="number" accept="any" name="descripcion" class="form-control @error('descripcion') is-invalid 
        @enderror" id="descripcion" value="{{old('descripcion')}}">
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-row">
    @if($info['credito']->pendiente === 1)
        @include('common.credito.partials._form')
        @if(!isset($info['credito']->json_array['historial_pagos']))
            <input type="number" accept="any" name="letra" class="form-control" id="letra" value="1" hidden>
        @else
            <input type="number" accept="any" name="letra" class="form-control" id="letra" value="{{$info['credito']->json_array['historial_pagos'] + 1}}" hidden>
        @endif
        <div class="form-button pt-4"> <button type="submit"
            class="btn btn-primary btn-block btn-lg"><span>Pagar y Facturar</span></button> </div>
        </div>
    @endif 
</div>
</form>

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

@endif

@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

