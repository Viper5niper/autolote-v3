        <!-- BIEN ES HORA DE USAR LA IMAGINACION+32-->

        <!-- FECHA DIA/MES/AÑO -->
        <label style="margin-left: 70mm;margin-top: 38mm;position: absolute;padding: 0">{{$factura->dia}}</label>
        <label style="margin-left: 90mm;margin-top: 38mm;position: absolute;padding: 0">{{$factura->mes}}</label>
        <label style="margin-left: 108mm;margin-top: 38mm;position: absolute;padding: 0">{{$factura->anio}}</label>
        
        <!-- Datos del Cliente -->

        <!-- CLIENTE --><label style="margin-left: 10mm;margin-top: 46mm;position: absolute;">{{$factura->payload['Cliente']['nombre']." ".$factura->payload['Cliente']['apellido']}}</label>    
        <!-- DIRECCION --><label style="margin-left: 13mm;margin-top: 52mm;position: absolute;">{{$factura->payload['Cliente']['direccion']}}</label>
        <!-- NIT O DUI --><input style="width:25mm; margin-left: 15mm;margin-top: 58mm;position: absolute;border:none;font-family:Verdana" value="{{$factura->payload['Cliente']['doc']}}">
        <!-- VENTA A CUENTA DE especificar que ella pidio aqui dijera si es credito -->
        <label style="margin-left: 80mm;margin-top: 58mm;position: absolute;">  Renta</label>

        <!-- Descripcion del producto -->

        <!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
        <label style="margin-left: 9mm;margin-top: 70.5mm;position: absolute;"></label>
        <label style="margin-left: 8mm;margin-top: 72mm;position: absolute;">Periodo&nbsp;de&nbsp;renta: &nbsp;{{$factura->payload['dias']}} Dias</label>
        <label style="margin-left: 8mm;margin-top: 78mm;position: absolute;">Placa:&nbsp;{{$factura->payload['Vehiculo']['placa']}}</label>
        <label style="margin-left: 8mm;margin-top: 84mm;position: absolute;">Marca:&nbsp;{{$factura->payload['Vehiculo']['marca']}}</label>
        <label style="margin-left: 8mm;margin-top: 90mm;position: absolute;">Modelo:&nbsp;{{$factura->payload['Vehiculo']['modelo']}}</label>
        <label style="margin-left: 8mm;margin-top: 96mm;position: absolute;">A&ntilde;o:&nbsp;{{$factura->payload['Vehiculo']['anio']}}</label>
        <label style="margin-left: 8mm;margin-top: 102mm;position: absolute;">Color:&nbsp;{{$factura->payload['Vehiculo']['color']}}</label>
        <label style="margin-left: 8mm;margin-top: 109mm;position: absolute;">Tipo:&nbsp;{{$factura->payload['Vehiculo']['tipo']}}</label>
        

        <!--  Fila 5  --> 

        <label style="margin-left: 8mm;margin-top: 115mm;position: absolute;">Inicio&nbsp;renta:&nbsp;{{$factura->payload['inicio']}}</label>
        <label style="margin-left: 8mm;margin-top: 120mm;position: absolute;">Final&nbsp;{{$factura->payload['final']}}</label>
        <label style="margin-left: 8mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 110mm;position: absolute;"></label>

        <!--    Fila 6  --> 

        <label style="margin-left: 9mm;margin-top: 116mm;position: absolute;"></label>
        
        <label style="margin-left: 70mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 92mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 116mm;position: absolute;"></label>

        
        <label style="margin-left: 9mm;margin-top: 141mm;position: absolute;"></label>
        <label style="margin-left: 70mm;margin-top: 130mm;position: absolute;">${{$factura->payload['monto']}}</label>
        <label style="margin-left: 70mm;margin-top: 141.5mm;position: absolute;"></label>
        
        
        <!-- FILA EXTRA VENTA TOTAl -->
        
        <label style="margin-left: 100mm;margin-top: 181mm;position: absolute;">${{$factura->payload['total']}}</label>

        
        <script type="text/javascript">
                setTimeout(function(){
                        window.print();
                        window.location.href = "{{route('renta')}}";
                }, 100);
        </script>