<tbody>
    <tr>
      <td>{{$factura->payload['dias']}}</td>
      <td>Dias de renta</td>
      <td>{{$factura->payload['monto']}}</td>
      <td>{{$factura->payload['total']}}</td>
    </tr>
    <tr>
      <td></td>
      <td>PLACA: {{$factura->payload['Vehiculo']['placa']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>MARCA: {{$factura->payload['Vehiculo']['marca']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>MODELO: {{$factura->payload['Vehiculo']['modelo']}}</td>
      <td></td>
      <td></td>
    </tr>
      <tr>
      <td></td>
      <td>Inicio renta: {{$factura->payload['inicio']}}</td>
      <td></td>
      <td></td>
    </tr>
      <tr>
      <td></td>
      <td>Fin renta: {{$factura->payload['final']}}</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th></th>
      <th></th>
      <th>Total Factura</th>
      <th>$ {{$factura->payload['total']}}</th>
    </tr>
  </tfoot>