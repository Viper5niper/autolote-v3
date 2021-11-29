@extends('adminlte::page')

@section('title', 'Rentas')

@section('content_header')

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Ventas</h1>
    <div class="col">
    <a class="btn btn-md btn-success float-right" href="{{route('renta.create',0)}}">
        --*--
    </a>
    </div>
</div>
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop