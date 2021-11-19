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

    <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" rel="stylesheet" >
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">

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

[
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        ],
        [
            'type' => 'css',
            'asset' => false,
            'location' => '//cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css',
        ],
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

    <div class="col-lg-12 ">
            {{-- Setup data for datatables --}}
            @php
                $heads = [
                    'ID',
                    'Name',
                    ['label' => 'Phone', 'width' => 40],
                    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
                ];

                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                $config = [
                    'language' => 
  array (
    'search' => 'Filter records:',
  ),

                    'data' => [
                        [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    ],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => true]],     
                    
                ];

            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads"  head-theme="light" striped hoverable beautify with-buttons>
                @foreach($config['data'] as $row)
                <tr>
                    @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
                @endforeach
            </x-adminlte-datatable>                            
        </div>

    