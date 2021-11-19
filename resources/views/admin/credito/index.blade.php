@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Creditos') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="card">
  <div class="mx-3 mt-1 mb-1 pb-3">
    <div class="row mt-3">
      <h1 class="col">Creditos</h1>
    </div>
  </div>
</div>
@stop
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)    
@php
    $info = []; 
@endphp
@foreach ($creditos as $index => $credito)
  @php
    $btnShow = "<a href='{{route('creditos.show',$credito->id)}}' class='btn btn-outline-info'><i class='fas fa-eye'></i></a>";
    $btnPay = "<a href='{{route('credito.pay',$credito->id)}}' class='btn btn-outline-danger'><i class='fas fa-shopping-cart'></i></a>";
                
    $info[$index][] = $credito->id;
    $info[$index][] = $credito->cliente->nombre." ".$credito->cliente->apellido;
    $info[$index][] = "$ ".$credito->monto;
    $info[$index][] = ($credito->interes * 100)."%";
    $info[$index][] = "$ ".$credito['json_array']['saldo'];
    $info[$index][] = $credito->pendiente === 1 ? "Pendiente" : "Pagado";
    $info[$index][] = "<nobr>".$btnShow." ".$btnPay."</nobr>"
                
  @endphp
@endforeach

@section('content') <!--Contenido de la pagina-->
  <div class="">
      <div class="col-12 card pt-3 pb-3">
        @php
          $heads = [
            '# Credito',
            'Cliente',
            'Monto',
            'Interes',
            'Saldo Actual',
            'Estado',
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
  </div>

@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

