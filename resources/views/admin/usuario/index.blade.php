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
        <td>botones</td>
      </tr>
      @endforeach
    </tbody>
  </table>

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
@stop