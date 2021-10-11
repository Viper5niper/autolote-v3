@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1 class="float-left">Clientes</h1>
    <a class="btn btn-md btn-success float-right" href="{{route('cliente.create')}}">
        Crear nuevo cliente
    </a>
@stop


@section('content')

@if (isset($message))
<x-adminlte-alert theme="primary" title="Exito">
    {{ $message }}
</x-adminlte-alert>
@endif

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable class="mt-3" id="table_clientes" :heads="$heads" hoverable>
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
        if(!confirm('Are you sure?')) return false;
      });
      </script>
@stop