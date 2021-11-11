<tbody>
    <tr>
      <td>1</td>
      <td>Venta de un vehiculo: </td>
      <td></td>
      <td></td>
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
      <td>A&Ntilde;O: {{$factura->payload['Vehiculo']['anio']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>COLOR: {{$factura->payload['Vehiculo']['color']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>TIPO: {{$factura->payload['Vehiculo']['tipo']}}</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th></th>
      <th></th>
      <th>Total Factura</th>
      <th>$ {{$factura->payload['monto']}}</th>
    </tr>
  </tfoot>