@extends('adminlte::page')
<!--Extiende de la plantilla, para el menu-->

@section('title', 'Facturas')
<!--Titulo de la pagina-->

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!--CSS del menu-->
@stop

@section('content_header')
    <!--Contenido de cabecera-->
@stop

@section('content')
<!--Contenido de la pagina-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 card d-flex justify-content-center mx-auto p-3">
            <h2>Facturar</h2>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th># Factura</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Area</th>
                <th>Tipo de Servicio</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
            <tr>
                <td>{{$factura->id}}</td>
                <td>{{$factura->n_factura}}</td>
                <td>{{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}</td> 
                <td>{{$factura->tipo}}</td>
                <td>@switch($factura->area_factura)
                    @case('V')
                        Ventas    
                    @break
                    @case('LC')
                        Creditos    
                    @break
                    @case('R')
                        Rentas    
                    @break
                    @default
                        **--**
                @endswitch
                
                </td>
                <td>
                    @switch($factura->area_factura)
                        @case('V')
                            @if ($factura->credito_id != null)
                                Venta a Credito
                            @else
                                Venta de Contado
                            @endif    
                        @break
                        @case('LC')
                            Pago de Cuota    
                        @break
                        @case('R')
                            Renta    
                        @break
                        @default
                            **--**
                    @endswitch
                </td>
                <td>${{$factura->payload['monto']}}</td>
                <td>
                    {{$factura->created_at}}
                </td>
                <td><a href="{{route('factura.show',$factura->id)}}" class="btn btn-info">Ver detalles</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th># Factura</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Area</th>
                <th>Tipo de Servicio</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Opcion</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
@endsection
@section('css')
<link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" rel="stylesheet" >
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'excel', 'pdf', 'print' ]
        } );
    
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    });
</script>


@stop
