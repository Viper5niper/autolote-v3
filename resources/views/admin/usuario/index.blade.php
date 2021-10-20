@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')

@include('partials._status')

<div class="row mt-3">
    <h1 class="col">Usuarios</h1>
    <div class="col">
    <a class="btn btn-md btn-success float-right" href="{{route('user.create')}}">
        Crear nuevo usuario
    </a>
    </div>
</div>
@stop


@section('content')

{{-- @include('partials._status') --}}

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable class="mt-3" id="table_usuarios" :heads="$heads" hoverable>
    @foreach($config['data'] as $row)
        <tr>
            @foreach($heads as $h)
                <td>{!! $row[$h] !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>


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