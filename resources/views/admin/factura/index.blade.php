@extends('adminlte::page')
<!--Extiende de la plantilla, para el menu-->

@section('title', 'Facturas')
<!--Titulo de la pagina-->

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!--CSS del menu-->
@stop

@section('content_header')
<div class="card mb-0">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Facturas</h1>
    </div>
  </div>
</div>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)    

<!--Contenido de la pagina-->
    <div class="col-lg-12 card pt-3 pb-3">
        {{-- Setup data for datatables --}}
        @php
            $heads = [
                '# Factura',
                'Cliente',
                'Tipo',
                'Area',
                'Tipo de Servicio',
                'Monto',
                'Fecha',
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

        <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" head-theme="light" striped hoverable beautify with-buttons>                
            @foreach($info as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
            @endforeach
        </x-adminlte-datatable>               
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
   
@stop

@section('js')

@stop
