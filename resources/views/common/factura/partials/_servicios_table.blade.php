<tbody>
    @foreach ($factura->payload['servicios'] as $sev)
    
    <tr>
        <td>{{$sev['cantidad']}}</td>
        <td>{{$sev['codigo']." ".$sev['descripcion']}}</td>
        <td>{{$sev['precio_unitario']}}</td>
        <td>${{$sev['total']}}</td>
      </tr>
    @endforeach
    <td></td>
    <td>Descuentos:</td>
    <td></td>
    <td> ${{$factura->payload['desc']}}</td>
  </tbody>
  <tfoot>
    <tr>
      <th></th>
      <th></th>
      <th>Total Factura</th>
      <th>$ {{$factura->payload['monto']}}</th>
    </tr>
  </tfoot>