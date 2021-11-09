@php
        $amount = (floatval($factura->payload['monto']));
        $sumas = round($amount / 1.13, 2);
        $iva = floor(($sumas * 0.13) * 100) / 100;

@endphp
<!-- DATOS GENERALES -->

<!-- Nombre --><label style="margin-left: 20mm;margin-top: 33mm;position: absolute;">{{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}</label>
<!-- Direccion --><label style="margin-left: 24mm;margin-top: 39mm;position: absolute;">{{$factura->payload['Cliente']['direccion']}}</label>
<!-- Registro No --><input style="margin-left: 125mm;margin-top: 33mm;position: absolute;border:none;font-family:Verdana" value='{{$factura->payload['ncr']}}'>
<!-- NIT --><input style="margin-left: 113mm;margin-top: 39mm;position: absolute;border:none;font-family:Verdana" value="{{$factura->payload['Cliente']['licencia']}}">
<!-- Fecha --><label style="margin-left: 160mm;margin-top: 33mm;position: absolute;">{{$factura->dia."/".$factura->mes."/".$factura->anio}}</label>
<!-- Giro --><label style="margin-left: 160mm;margin-top: 39mm;position: absolute;"></label>
<!-- Municipio --><label style="margin-left: 24mm;margin-top: 45mm;position: absolute;"></label>
<!-- Departamento --><label style="margin-left: 80mm;margin-top: 45mm;position: absolute;"></label>
<!-- n/Remision --><label style="margin-left: 123mm;margin-top: 45mm;position: absolute;"></label>
<!-- Condiciones de Pago --><label style="margin-left: 180mm;margin-top: 45mm;position: absolute;"> Venta</label>

<!-- DESCRIPCION -->

<!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
<label style="margin-left: 9mm;margin-top: 50.5mm;position: absolute;">{{$factura->payload['descripcion']}}</label>
<label style="margin-left: 9mm;margin-top: 55mm;position: absolute;">Placa:&nbsp;{{$factura->payload['Vehiculo']['placa']}}&nbsp;Marca:&nbsp;{{$factura->payload['Vehiculo']['marca']}}</label>
<label style="margin-left: 9mm;margin-top: 61mm;position: absolute;">Modelo:&nbsp;{{$factura->payload['Vehiculo']['modelo']}}&nbsp;A&ntilde;o:&nbsp;{{$factura->payload['Vehiculo']['anio']}}</label>
<label style="margin-left: 9mm;margin-top: 67mm;position: absolute;">Tipo:{{$factura->payload['Vehiculo']['tipo']}}&nbsp;Color:&nbsp;{{$factura->payload['Vehiculo']['color']}}</label>
<label style="margin-left: 9mm;margin-top: 73mm;position: absolute;"></label>
<label style="margin-left: 9mm;margin-top: 79mm;position: absolute;"></label>
<label style="margin-left: 9mm;margin-top: 85mm;position: absolute;"></label>
<!-- fila 6-->
<label style="margin-left: 21mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 155mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 135.5mm;margin-top: 77mm;position: absolute;">${{$factura->payload['monto']}}</label>

<!-- extras sumas -->

<label style="margin-left: 165mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 174mm;margin-top: 82.5mm;position: absolute;">$@php echo $sumas; @endphp</label>

<!-- IVA --><label style="margin-left: 174mm;margin-top: 87mm;position: absolute;">$@php echo $iva; @endphp</label>
<!-- SUBTOTAL --><label style="margin-left: 174mm;margin-top: 93mm;position: absolute;">${{$factura->payload['monto']}}</label>
<!-- IVA RETENIDO --><label style="margin-left: 188mm;margin-top: 119mm;position: absolute;"></label>
<!-- VENTAS NO SUJETAS --><label style="margin-left: 188mm;margin-top: 125mm;position: absolute;"></label>
<!-- VENTAS EXENTAS --><label style="margin-left: 176mm;margin-top: 131mm;position: absolute;"></label>
<!-- TOTAL --><label style="margin-left: 174mm;margin-top: 114.5mm;position: absolute;">${{$factura->payload['monto']}}</label>

<script type="text/javascript">
        setTimeout(function(){
                window.print();
                window.location.href = "{{route('vehiculo')}}";
        }, 100);
</script>