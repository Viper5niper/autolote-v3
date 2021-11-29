<!-- DATOS GENERALES -->
    
    
<!-- Nombre --><label style="font-size: 12px;margin-left: 12mm;margin-top: 28mm;position: absolute;">{{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}</label>
<!-- Direccion --><label style="font-size: 12px;margin-left: 17mm;margin-top: 34mm;position: absolute;">{{$factura->payload['Cliente']['direccion']}}</label>
<!-- Registro--><input style="margin-left: 118mm;margin-top: 28mm;position: absolute;border:none;font-family:Verdana" value='{{$factura->payload['ncr']}}'>
<!-- NIT--><input style="margin-left: 107mm;margin-top: 34mm;position: absolute;border:none;font-family:Verdana" value=''>
<!-- Fecha --><label style="margin-left: 155mm;margin-top: 28mm;position: absolute;">{{$factura->dia ."/". $factura->mes."/".$factura->anio}}</label>
<!-- Giro --><label style="margin-left: 160mm;margin-top: 39mm;position: absolute;"></label>
<!-- Municipio --><label style="margin-left: 24mm;margin-top: 45mm;position: absolute;"></label>
<!-- Departamento --><label style="margin-left: 80mm;margin-top: 45mm;position: absolute;"></label>
<!-- n/Remision --><label style="margin-left: 123mm;margin-top: 45mm;position: absolute;"></label>
<!-- Condiciones de Pago --><label style="margin-left: 175.5mm;margin-top: 39mm;position: absolute;">Credito</label>

<!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
@php
        $mt = 65;
@endphp
<!-- Descripcion del producto -->
@foreach ($factura->payload['servicios'] as $servicio)
        <label style="margin-left: 9mm  ;margin-top: {{$mt}}mm;position: absolute;font-size: 12px"> {{$servicio['cantidad']}} </label>
        <label style="margin-left: 21mm ;margin-top: {{$mt}}mm;position: absolute;font-size: 12px;white-space: nowrap;
        overflow: hidden;text-overflow: ellipsis;max-width: 55mm"> {{$servicio['descripcion']}} </label>
        <label style="margin-left: 165mm ;margin-top: {{$mt}}mm;position: absolute;font-size: 12px"> {{$servicio['precio_unitario']}} </label>
        <label style="margin-left: 176mm ;margin-top: {{$mt}}mm;position: absolute;">  </label>
        <label style="margin-left: 188mm;margin-top: {{$mt}}mm;position: absolute;font-size: 12px"> {{$servicio['total']}} </label>
        @php
                $mt = $mt + 7; 
        @endphp
@endforeach

<label style="margin-left: 120mm;margin-top: 78mm;position: absolute;">Descuentos: &nbsp;{{$factura->payload['desc']}}</label>

<label style="margin-left: 172mm;margin-top: 82.5mm;position: absolute;">${{$factura->payload['total']}}</label>

<!-- IVA --><label style="margin-left: 172mm;margin-top: 87mm;position: absolute;"></label>
<!-- SUBTOTAL --><label style="margin-left: 172mm;margin-top: 93mm;position: absolute;">${{$factura->payload['monto']}}</label>
<!-- IVA RETENIDO --><label style="margin-left: 188mm;margin-top: 119mm;position: absolute;"></label>
<!-- VENTAS NO SUJETAS --><label style="margin-left: 188mm;margin-top: 125mm;position: absolute;"></label>
<!-- VENTAS EXENTAS --><label style="margin-left: 176mm;margin-top: 131mm;position: absolute;"></label>
<!-- TOTAL --><label style="margin-left: 172mm;margin-top: 114.5mm;position: absolute;">${{$factura->payload['monto']}}</label>
    
<script type="text/javascript">
        setTimeout(function(){
                window.print();
                window.location.href = "{{route('ventanf')}}";
        }, 100);
</script>