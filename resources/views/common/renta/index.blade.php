@extends('adminlte::page')

@section('title', 'Rentas')

@section('content_header')

@include('partials._status')
<div class="card">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Rentas</h1>
      <div class="col">
        <a class="btn btn-md btn-success float-right" href="{{route('renta.create',0)}}">
            Rentar un vehiculo
        </a>
      </div>
    </div>
  </div>
</div>
@stop


@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $('.delete_client').click(function(e){
        if(!confirm('Va a eliminar un cliente, esta seguro?')) return false;
      });
      </script>
@stop