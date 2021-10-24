@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

@include('partials._status')

<div class="card">
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

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre de Usuario</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">Tipo</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $item)
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
  </tbody>
</table>
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