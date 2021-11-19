@extends('adminlte::page')

@section('title', 'Rentas')

@section('content_header')

@include('partials._status')
<div class="card mb-0">
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
<div class="col-lg-12 card mx-auto my-3 p-4">
  @php

    $heads = [
      'Placa',
      'Cliente',
      'Fecha de Renta',
      'Fecha Devolucion',
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
  <x-adminlte-datatable class="mt-3" id="table_clientes" :heads="$heads" :config="$config" head-theme="light" striped hoverable beautify with-buttons>
    @if(isset($renta[0]->id))
    @foreach($renta as $rent)
    <tr>
      <th scope="row">{{$rent['json_array']['Vehiculo']['placa']}}</th>
      <td>{{$rent['json_array']['Cliente']['nombre']." ".$rent['json_array']['Cliente']['apellido']}}</td>
      <td>{{$rent['json_array']['inicio']}}</td>
      <td>{{$rent['json_array']['final']}}</td>
      <td>@if($rent['estado'] === 1 )
        <h5><span class="badge badge-success">Activa</span></h5> @else  <h5><span class="badge badge-secondary">Finalizada</span></h5> @endif</td>
      <td>@if ($rent['estado'] === 1)
            <a class='btn btn-outline-info' href="{{route("renta.show",$rent->id)}}" title="see">
              <i class="fa fa-eye"></i>
            </a>
            <a class='btn btn-outline-primary' href="{{route("renta.return",$rent->id)}}" title="return">
              <i class="fa fa-undo"></i>
            </a>
          @else
            **---**
            {{--<a class='btn btn-lg ' style='background-color:transparent;' href="/cliente/' . $this->id . '" title="see">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                              </a>--}}
          @endif
      </td>
    </tr>
    @endforeach
    @else
    <tr>
      <th scope="row" colspan="6">No hay rentas realizadas</th>
    </tr>
    @endif
  </x-adminlte-datatable>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  $('.delete_client').click(function(e) {
    if (!confirm('Va a eliminar un cliente, esta seguro?')) return false;
  });
</script>
@stop