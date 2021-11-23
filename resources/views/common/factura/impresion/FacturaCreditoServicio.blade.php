<!-- DATOS GENERALES -->
    
    
<!-- Nombre --><label style="font-size: 12px;margin-left: 12mm;margin-top: 28mm;position: absolute;">{{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}</label>
<!-- Direccion --><label style="font-size: 12px;margin-left: 17mm;margin-top: 34mm;position: absolute;">{{$factura->payload['Cliente']['direccion']}}</label>
<!-- Registro--><input style="margin-left: 118mm;margin-top: 28mm;position: absolute;border:none;font-family:Verdana" value='{{$factura->payload['ncr']}}'>
<!-- NIT--><input style="margin-left: 107mm;margin-top: 34mm;position: absolute;border:none;font-family:Verdana" value='{{$factura->payload['Cliente']['licencia']}}'>
<!-- Fecha --><label style="margin-left: 155mm;margin-top: 28mm;position: absolute;">{{$factura->dia ."/". $factura->mes."/".$factura->anio}}</label>
<!-- Giro --><label style="margin-left: 160mm;margin-top: 39mm;position: absolute;"></label>
<!-- Municipio --><label style="margin-left: 24mm;margin-top: 45mm;position: absolute;"></label>
<!-- Departamento --><label style="margin-left: 80mm;margin-top: 45mm;position: absolute;"></label>
<!-- n/Remision --><label style="margin-left: 123mm;margin-top: 45mm;position: absolute;"></label>
<!-- Condiciones de Pago --><label style="margin-left: 175.5mm;margin-top: 39mm;position: absolute;">Credito</label>

<!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
<label style="margin-left: 9mm;margin-top: 65mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 52mm;position: absolute;">Valor&nbsp;de&nbsp;la&nbsp;Factura:&nbsp;${{$factura->payload['monto_credito']}}</label>
<!--<label style="margin-left: 155mm;margin-top: 65mm;position: absolute;">Letra&nbsp;N°&nbsp;<?php //echo $letra; ?></label>-->
<label style="margin-left: 165mm;margin-top: 65mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 65mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 65mm;position: absolute;"></label>

<!--    Fila 2   -->

<label style="margin-left: 9mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 56mm;position: absolute;">Saldo&nbsp;Anterior:&nbsp;${{$factura->payload['saldo_anterior']}}</label>
<label style="margin-left: 155mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 71mm;position: absolute;"></label>

<!--    Fila 3   -->

<label style="margin-left: 9mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 61mm;position: absolute;">Saldo&nbsp;abonado:&nbsp;${{$factura->payload['saldo_abonado']}}</label>
<label style="margin-left: 155mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 77mm;position: absolute;"></label>

<!--    Fila 4   -->

<label style="margin-left: 9mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 67mm;position: absolute;">Saldo&nbsp;Actual:&nbsp;${{$factura->payload['saldo_actual']}}</label>
<label style="margin-left: 155mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 83mm;position: absolute;"></label>

<!--    Fila 5   -->

<label style="margin-left: 21mm;margin-top: 72mm;position: absolute;">Descripcion&nbsp;:&nbsp;{{$factura->payload['descripcion']}}</label>
<label style="margin-left: 21mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 155mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 89mm;position: absolute;"></label>

<!--    Fila 6   -->

<label style="margin-left: 9mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 120mm;margin-top: 78mm;position: absolute;">Intereses&nbsp;{{$factura->payload['interes']}}</label>
<label style="margin-left: 165mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 95mm;position: absolute;"></label>

<!-- extras sumas -->

<label style="margin-left: 165mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 101mm;position: absolute;"></label>


<label style="margin-left: 135.5mm;margin-top: 77mm;position: absolute;"></label>

<!-- extras sumas -->

<label style="margin-left: 165mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 172mm;margin-top: 82.5mm;position: absolute;">${{$factura->payload['subtotal']}}</label>

<!-- IVA --><label style="margin-left: 172mm;margin-top: 87mm;position: absolute;">${{$factura->payload['iva']}}</label>
<!-- SUBTOTAL --><label style="margin-left: 172mm;margin-top: 93mm;position: absolute;">${{$factura->payload['total']}}</label>
<!-- IVA RETENIDO --><label style="margin-left: 188mm;margin-top: 119mm;position: absolute;"></label>
<!-- VENTAS NO SUJETAS --><label style="margin-left: 188mm;margin-top: 125mm;position: absolute;"></label>
<!-- VENTAS EXENTAS --><label style="margin-left: 176mm;margin-top: 131mm;position: absolute;"></label>
<!-- TOTAL --><label style="margin-left: 172mm;margin-top: 114.5mm;position: absolute;">${{$factura->payload['total']}}</label>
    
<script type="text/javascript">
        setTimeout(function(){
                window.print();
                window.location.href = "{{route('creditos')}}";
        }, 100);
</script>