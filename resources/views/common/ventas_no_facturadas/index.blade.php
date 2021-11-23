@extends('adminlte::page')

@section('title', 'Bienvenid@')

@section('content_header')
   <h1></h1>
@stop

@section('content')

<div class="container">
    <div class="row">
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
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/imask"></script>
@stop