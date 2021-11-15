@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Creditos') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="card">
  <div class="mx-3 mt-1 mb-3">
    <div class="row mt-3">
      <h1 class="col">Creditos</h1>
    </div>
  </div>
</div>
@stop

@section('content') <!--Contenido de la pagina-->
<div class="container">
    <div class="row">
        <div class="col-lg-11 card mx-auto my-3 p-5">
          <table class="table">
            <thead class="thead">
              <tr>
                <th scope="col"># Credito</th>
                <th scope="col">Cliente</th>
                <th scope="col">Monto</th>
                <th scope="col">Interes</th>
                <th scope="col">Saldo Actual</th>
                <th scope="col">Estado</th>
                <th scope="col">Opcion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($creditos as $credito)
              <tr>
                <th scope="row">{{$credito->id}}</th>
                <td>{{$credito->cliente->nombre." ".$credito->cliente->apellido}}</td>
                <td>${{$credito->monto}}</td>
                <td>{{$credito->interes * 100}}%</td>
                <td>${{$credito['json_array']['saldo']}}</td>
                <td>{{$credito->pendiente === 1 ? "Pendiente" : "Pagado"}}</td>
                <td>
                  <a href="{{route('creditos.show',$credito->id)}}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                  <a href="{{route('credito.pay',$credito->id)}}" class="btn btn-outline-danger"><i class="fas fa-shopping-cart"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
@stop

