@extends('adminlte::page') <!--Extiende de la plantilla, para el menu-->

@section('title', 'Servicios') <!--Titulo de la pagina-->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> <!--CSS del menu-->
@stop

@section('content_header')  <!--Contenido de cabecera-->

@include('partials._status')
<div class="card">
  <div class="mx-3 mt-1 mb-1 pb-3">
    <div class="row mt-3">
      <h1 class="col">Servicios</h1>
      <div class="col">
        <a class="btn btn-md btn-success float-right" href="{{route('servicios.create')}}">
          Crear Servicio
        </a>
      </div>
    </div>
  </div>
</div>
@stop
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)    
@php
    $info = []; 
@endphp
@foreach ($servicios as $index => $servicio)
  @php
    $btnShow = "<a href='/servicios/$servicio->id/editar' class='btn btn-outline-info'><i class='fas fa-pen'></i></a>"; 
    $btnDel = "<a onclick='eliminar('{{route('user.destroy',$servicio->id)}}');' class='btn btn-outline-danger' data-toggle='modal'
                    data-target='#DeletedModal'><i class='fas fa-trash'></i></a>";           
    
    $info[$index][] = $servicio->id;
    $info[$index][] = $servicio->cod;
      switch ($servicio->area_empresa) {
        case 'R':
          $info[$index][] = "Rentas";
          break;
        case 'STA':
          $info[$index][] = "Taller Automotriz";
          break;
        case 'STP':
          $info[$index][] = "Taller de Pintura";
          break;
        case 'SC':
          $info[$index][] = "CarWash";
          break;
        case 'O':
          $info[$index][] = "Otros";
          break;
        default:
          $info[$index][] = "**--**";
      }
    
    $info[$index][] = "$ ".$servicio->precio;
    $info[$index][] = ($servicio->descuento * 100)."%";
    $info[$index][] = "$".($servicio->precio - ($servicio->precio * $servicio->descuento));
    $info[$index][] = $servicio->descripcion;
    $info[$index][] = "<nobr>".$btnShow." ".$btnDel."</nobr>"
                
  @endphp
@endforeach

@section('content') <!--Contenido de la pagina-->
  <div class="">
      <div class="col-12 card pt-3 pb-3">
        @php
          $heads = [
            
            'Codigo',
            'Area de Servicio',
            'Precio',
            'Descuento',
            'Precio Descuento',
            'Descripcion',
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
          @foreach($servicios as $servicio)
            <tr>          
              
              <td>{{$servicio->cod}}</td>
              @switch ($servicio->area_empresa)
                  @case ('R')
                    <td>Rentas</td>
                    @break
                  @case ('STA')
                    <td>Taller Automotriz</td>
                    @break
                  @case ('STP')
                    <td>Taller de Pintura</td>
                    @break
                  @case ('SC')
                    <td>CarWash</td>
                    @break;
                  @case ('O') 
                    <td>Otros</td>
                    @break;
                  @default
                    <td>**--**</td>
              @endswitch
              
              <td>${{$servicio->precio}}</td>
              <td>{{($servicio->descuento * 100)}}%</td>
              <td>${{($servicio->precio - ($servicio->precio * $servicio->descuento))}}</td>
              <td>{{$servicio->descripcion}}</td>
              <td><nobr>
                <a href="{{route('servicios.edit',$servicio->id)}}" class="btn btn-outline-info"><i class="fas fa-pen"></i></a>
                <a onclick="eliminar('{{route('servicios.destroy',$servicio->id)}}');" class="btn btn-outline-danger" data-toggle="modal"
                    data-target="#DeletedModal"><i class="fas fa-trash"></i></a>  
              </nobr></tr>
          @endforeach
        </x-adminlte-datatable>               
      </div>
  </div>
  @include('/partials/_modal-deleted',
    ['modal_title'=> 'Eliminar Servicio',
    'modal_message'=>'Esta seguro que desea eliminar el servicio?','btnTipo'=>'danger',
    'ruta'=>''])
@stop


@section('js')
<script src="https://unpkg.com/imask"></script>
<script src="/js/utilities.js"></script>
<script type="application/javascript">
  function eliminar(e){
    console.log(e);
    let form = document.getElementById('form-delete');
    form.setAttribute("action",e);
  }
</script>
@stop

