@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Creditos') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="row mt-3">
    <h1 class="col">Creditos</h1>
</div>

@stop

@section('content') <!--Contenido de la pagina-->
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"># Credito</th>
        <th scope="col">Monto</th>
        <th scope="col">Interes</th>
        <th scope="col">Saldo Actual</th>
        <th scope="col">Estado</th>
        <th scope="col">Cliente</th>
        <th scope="col">Opcion</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($creditos as $item)
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
        <td>{{$item->name}}</td>
        <td>{{$item->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

