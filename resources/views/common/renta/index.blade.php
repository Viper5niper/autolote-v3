@extends('adminlte::page')

@section('title', 'Rentas')

@section('content_header')

@include('partials._status')
<div class="card">
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
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th scope="col">Placa</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha de Renta</th>
            <th scope="col">Fecha Devolucion</th>
            <th scope="col">Estado</th>
            <th scope="col">Opcion</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($rentas[0]->id))
             @foreach ($renta as $rent)
              <tr>
                <th scope="row">{{$rent['json_array']['Vehiculo']['placa']}}</th>
                <td>{{$rent['json_array']['Cliente']['nombre']." ".$rent['json_array']['Cliente']['apellido']}}</td>
                <td>{{$rent['json_array']['inicio']}}</td>
                <td>{{$rent['json_array']['final']}}</td>
                <td>{{$rent['estado'] === 1 ? "Activa" : "Finalizada"}}</td>
                <td>@if ($rent['estado'] === 1)
                        {{--<a class='btn btn-lg ' style='background-color:transparent;' href="/cliente/' . $this->id . '" title="see">
                            <i class="fa fa-eye"></i>
                        </a>--}}
                        <a class='btn btn-lg ' style='background-color:transparent;' href="/cliente/' . $this->id . '" title="return">
                            <i class="fa fa-pen"></i>
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
          
        
        </tbody>
      </table>
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
@stop