@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

@include('partials._status')

<div class="card mb-0">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Usuarios</h1>
      <div class="col">
        <a class="btn btn-md btn-success float-right" href="{{route('user.create')}}">
          Crear nuevo usuario
        </a>
      </div>
    </div>
  </div>
</div>
@stop
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true) 

@section('content')
<div class="">
    <div class="">
        <div class="col-lg-12 card mx-auto p-4">
          @php
            $heads = [
              'ID',
              'Nombre de Usuario',
              'Correo Electronico',
              'Tipo',
              'Opciones',
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
          <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" head-theme="light" striped hoverable beautify >                
          @foreach($usuarios as $item)
            <tr>
             <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role == 1 ? "Admin" : "Usuario"}}</td>
                <td>
                  <a href="{{route('user.edit',$item->id)}}" class="btn btn-outline-info"><i class="fas fa-pen"></i></a>
                  <a onclick="eliminar('{{route('user.destroy',$item->id)}}');" class="btn btn-outline-danger" data-toggle="modal"
                    data-target="#DeletedModal"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
          @endforeach
          </x-adminlte-datatable>
        </div>
    </div>
</div>

@include('/partials/_modal-deleted',
['modal_title'=> 'Eliminar Usuario',
'modal_message'=>'Esta seguro que desea eliminar el Usuario?','btnTipo'=>'danger',
'ruta'=>''])
@stop

@section('js')
<script type="application/javascript">
  function eliminar(e){
    console.log(e);
    let form = document.getElementById('form-delete');
    form.setAttribute("action",e);
  }
</script>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop