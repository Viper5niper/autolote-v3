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

@php
        $mt = 71;
@endphp
<!-- Descripcion del producto -->
@foreach ($factura->payload['servicios'] as $servicio)
        <label style="margin-left: 9mm  ;margin-top: {{$mt}}mm;position: absolute;font-size: 12px"> {{$servicio['cantidad']}} </label>
        <label style="margin-left: 15mm ;margin-top: {{$mt}}mm;position: absolute;font-size: 12px;white-space: nowrap;
        overflow: hidden;text-overflow: ellipsis;max-width: 55mm"> {{$servicio['descripcion']}} </label>
        <label style="margin-left: 70mm ;margin-top: {{$mt}}mm;position: absolute;font-size: 12px"> {{$servicio['precio_unitario']}} </label>
        <label style="margin-left: 92mm ;margin-top: {{$mt}}mm;position: absolute;">  </label>
        <label style="margin-left: 103mm;margin-top: {{$mt}}mm;position: absolute;">  </label>
        <label style="margin-left: 114mm;margin-top: {{$mt}}mm;position: absolute;font-size: 12px"> {{$servicio['total']}} </label>
        @php
                $mt = $mt + 8; 
        @endphp
@endforeach

<!-- FILA EXTRA VENTA TOTAl -->
<label style="margin-left: 15mm;margin-top: 120mm;position: absolute;">Descuentos: ${{$factura->payload['desc']}}</label>
<label style="margin-left: 103mm;margin-top: 180mm;position: absolute;">&nbsp;${{$factura->payload['total']}}</label>

<script type="text/javascript">
        setTimeout(function(){
                window.print();
                window.location.href = "{{route('ventanf')}}";
        }, 100);
</script>