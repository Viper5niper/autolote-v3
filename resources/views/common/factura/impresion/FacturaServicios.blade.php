<!-- BIEN ES HORA DE USAR LA IMAGINACION+32-->

<!-- FECHA DIA/MES/AÑO -->
<label style="margin-left: 70mm;margin-top: 37mm;position: absolute;padding: 0">{{$factura->dia}}</label>
<label style="margin-left: 90mm;margin-top: 37mm;position: absolute;padding: 0">{{$factura->mes}}</label>
<label style="margin-left: 108mm;margin-top: 37mm;position: absolute;padding: 0">{{$factura->anio}}</label>

<!-- Datos del Cliente -->

<!-- CLIENTE --><label style="margin-left: 10mm;margin-top: 45mm;position: absolute;">{{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}</label>
<!-- DIRECCION --><label style="margin-left: 13mm;margin-top: 51mm;position: absolute;">{{$factura->payload['Cliente']['direccion']}}</label>
<!-- NIT O DUI --><input style="width:25mm; margin-left: 15mm;margin-top: 57mm;position: absolute;border:none;font-family:Verdana" value='{{$factura->payload['Cliente']['doc']}}'>
<!-- VENTA A CUENTA DE especificar que ella pidio aqui dijera si es credito -->
<label style="margin-left: 80mm;margin-top: 57mm;position: absolute;">Servicios</label>

<!-- Descripcion del producto -->

<!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
<label style="margin-left: 9mm;margin-top: 70.5mm;position: absolute;"></label>
<label style="margin-left: 8mm;margin-top: 71mm;position: absolute;">Valor&nbsp;de&nbsp;la&nbsp;Factura:&nbsp;${{$factura->payload['monto_credito']}}</label>
<!--<label style="margin-left: 70mm;margin-top: 70.5mm;position: absolute;">Letra&nbsp;N°&nbsp;<?php //echo $letra; 
                                                                                                ?></label>-->
<label style="margin-left: 8mm;margin-top: 77mm;position: absolute;">Credito&nbsp;N&deg;&nbsp;:&nbsp;{{$factura->payload['n_credito']}}</label>
<label style="margin-left: 103mm;margin-top: 70.5mm;position: absolute;"></label>
<label style="margin-left: 114mm;margin-top: 70.5mm;position: absolute;"></label>

<label style="margin-left: 70mm;margin-top: 104mm;position: absolute;"></label>
<label style="margin-left: 9mm;margin-top: 93mm;position: absolute;">Saldo&nbsp;Anterior:&nbsp;${{$factura->payload['saldo_anterior']}}</label>
<label style="margin-left: 70mm;margin-top: 104mm;position: absolute;"></label>
<label style="margin-left: 92mm;margin-top: 104mm;position: absolute;"></label>
<label style="margin-left: 103mm;margin-top: 104mm;position: absolute;"></label>
<label style="margin-left: 114mm;margin-top: 104mm;position: absolute;"></label>

<!--  Fila 5  -->

<label style="margin-left: 9mm;margin-top: 110mm;position: absolute;"></label>
<label style="margin-left: 9mm;margin-top: 102mm;position: absolute;">Saldo&nbsp;abonado:&nbsp;${{$factura->payload['saldo_abonado']}}</label>
<label style="margin-left: 70mm;margin-top: 110mm;position: absolute;"></label>
<label style="margin-left: 92mm;margin-top: 110mm;position: absolute;"></label>
<label style="margin-left: 103mm;margin-top: 110mm;position: absolute;"></label>
<label style="margin-left: 114mm;margin-top: 110mm;position: absolute;"></label>

<!--    Fila 6  -->

<label style="margin-left: 9mm;margin-top: 116mm;position: absolute;"></label>
<label style="margin-left: 9mm;margin-top: 108mm;position: absolute;">Saldo&nbsp;Actual:&nbsp;${{$factura->payload['saldo_actual']}}</label>
<label style="margin-left: 9mm;margin-top: 115mm;position: absolute;">Descripcion&nbsp;:&nbsp;{{$factura->payload['descripcion']}}</label>
<label style="margin-left: 92mm;margin-top: 116mm;position: absolute;"></label>
<label style="margin-left: 103mm;margin-top: 116mm;position: absolute;"></label>
<label style="margin-left: 114mm;margin-top: 116mm;position: absolute;"></label>


<label style="margin-left: 9mm;margin-top: 141mm;position: absolute;"></label>
<label style="margin-left: 9mm;margin-top: 129mm;position: absolute;"> Intereses&nbsp;{{$factura->payload['interes']}}
<label style="margin-left: 70mm;margin-top: 141.5mm;position: absolute;"></label>


<!-- FILA EXTRA VENTA TOTAl -->

<label style="margin-left: 103mm;margin-top: 180mm;position: absolute;">&nbsp;${{$factura->payload['total']}}</label>

<script type="text/javascript">
        setTimeout(function(){
                window.print();
                window.location.href = "{{route('creditos')}}";
        }, 100);
</script>