<tbody>
    <tr>
      <td></td>
      <td>Valor de la factura: </td>
      <td>{{$factura->payload['monto_credito']}}</td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Credito N: {{$factura->payload['n_credito']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Saldo Anterior: {{$factura->payload['saldo_anterior']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Saldo Abonado: {{$factura->payload['saldo_abonado']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Saldo Actual: {{$factura->payload['saldo_actual']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Intereses: {{$factura->payload['interes']}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Descripcion: {{$factura->payload['descripcion']}}</td>
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