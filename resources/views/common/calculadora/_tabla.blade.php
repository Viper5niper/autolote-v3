<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">N&deg;</th>
        <th scope="col">Cuota</th>
        <th scope="col">Interes</th>
        <th scope="col">Monto a Pagar</th>
        <th scope="col">Nuevo Saldo</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($tabla as $item )
        <tr>
            <th scope="row">{{$item["letra"]}}</th>
            <td>${{$item["cuota"]}}</td>
            <td>${{$item["interes"]}}</td>
            <td>${{$item["monto_pagar"]}}</td>
            <td>${{$item["monto_restante"]}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>