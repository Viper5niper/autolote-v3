@extends('adminlte::page')

@section('title', 'Bienvenid@')

@section('content_header')

<div class="card">
  <div class="mx-3 mt-1 mb-1 pb-3">
    <div class="row mt-3">
      <h1 class="col">Lista de Servicios</h1>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="col-12 card pt-3 pb-3">
    @php
    $heads = [
        
        'Nombre',
        'Apellido',
        'DUI',
        'Placa',
        'Opcion',
    ];

    $config = [
        'language' => [
            "url" => "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json",
            "paginate" => [
            "next" => '»',
            "previous" => '«'
            ],
        ],

        'order' => [[1, 'asc']],
    ];
    @endphp

    <x-adminlte-datatable id="servicios" :heads="$heads" :config="$config" head-theme="light" striped hoverable beautify>                
        @foreach($ventas as $venta)
            <tr>          
                <td>{{$venta['json_array']['nombre']}}</td>
                <td>{{$venta['json_array']['apellido']}}</td>
                <td>{{$venta['json_array']['doc']}}</td>
                <td>{{$venta['json_array']['placa']}}</td>
                <td><nobr>
                    <a href="{{route("ventanf.show",$venta->id)}}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                </nobr>
            </tr>
        @endforeach
    </x-adminlte-datatable>               
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/imask"></script>
@stop