@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')

@include('partials._status')
<div class="card mb-0">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Clientes</h1>
      <div class="col">
        <a class="btn btn-md btn-success float-right" href="{{route('cliente.create')}}">
            Crear nuevo cliente
        </a>
      </div>
    </div>
  </div>
</div>
@stop
@section('content')
<div class="">
    <div class="">
        <div class="col-lg-12 card mx-auto p-4">
          @php

            $heads = [
              'ID',
              'Nombres',
              'Apellidos',
              'Tipo de Documento',
              'Documento',
              'Direccion',
              'Telefono',
              'Celular',
              'Acciones',
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
              @foreach($clientes as $item)
                  <tr>
                      <th>{{$item->id}}</th>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->apellido}}</td>
                      <td>{{mb_strtoupper($item->tipo_doc)}}</td>
                      <td>{{$item->doc}}</td>
                      <td>{{$item->direccion}}</td>
                      <td>{{$item->telefono}}</td>
                      <td>{{$item->celular}}</td>
                      <td><nobr>
                        <a class="btn btn-outline-primary" href="/cliente/{{$item->id}}" title="Edit">
                          <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-outline-danger delete_client" href="/cliente/delete/{{$item->id}}" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                        </a>
                        <a class="btn btn-outline-info" href="/cliente/{{$item->id}}/editar" title="Details">
                          <i class="fa fa-lg fa-fw fa-pen"></i>
                       </a>
                      </nobr></td>
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
    <script>
    $('.delete_client').click(function(e){
        if(!confirm('Va a eliminar un cliente, esta seguro?')) return false;
      });
    </script>
      <script src="https://unpkg.com/imask"></script>
      <script src="/js/utilities.js"></script>
@stop
