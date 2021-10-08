@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="float-left">Clientes</h1>
    <a class="btn btn-md btn-success float-right" href="{{route('cliente.create')}}">
        Crear nuevo cliente
    </a>
@stop


@section('content')
@php
// foreach($config['data'] as $row){
//             foreach($row as $cell){
//                 print_r($cell . " : " . $row);
//             }
// }

// foreach($heads as $key => $value){
//     print_r($key . " : " . $value);
// }

// foreach($config['data'] as $k => $v) { dd($v); }
// dd("done");
// $heads = [
//     'ID',
//     'Name',
//     ['label' => 'Phone', 'width' => 40],
//     ['label' => 'Actions', 'no-export' => true, 'width' => 5],
// ];

// $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
//                 <i class="fa fa-lg fa-fw fa-pen"></i>
//             </button>';
// $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
//                   <i class="fa fa-lg fa-fw fa-trash"></i>
//               </button>';
// $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
//                    <i class="fa fa-lg fa-fw fa-eye"></i>
//                </button>';

// $config = [
//     'data' => [
//         [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
//         [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
//         [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
//     ],
//     'order' => [[1, 'asc']],
//     'columns' => [null, null, null, ['orderable' => false]],
// ];
@endphp

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