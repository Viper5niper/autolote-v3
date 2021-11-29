        <!-- BIEN ES HORA DE USAR LA IMAGINACION+32-->
        <?php $detalles = $datos->detalles;

        $array = json_decode($detalles);

        foreach ($array as $value => $valor) {
                if ($value == 'nombre') {
                        $nombres = $valor;
                }
                if ($value == 'direccion') {
                        $direccion = $valor;
                }
                if ($value == 'documento') {
                        $documento = $valor;
                }
                if ($value == 'NIT') {
                        $nit = $valor;
                }
                if ($value == 'titulo') {
                        $titulo = $valor;
                }
                if ($value == 'credito') {
                        $credito = $valor;
                }
                if ($value == 'anterior') {
                        $santerior = $valor;
                }
                if ($value == 'abonado') {
                        $sabonado = $valor;
                }
                if ($value == 'actual') {
                        $sactual = $valor;
                }
                if ($value == 'interes') {
                        $interes = $valor;
                }
                if ($value == 'total') {
                        $total = $valor;
                }
                if ($value == 'procedencia') {
                        $procedencia = $valor;
                }
                if ($value == 'monto') {
                        $monto = $valor;
                }
        }

        $fecha = $datos->fecha;
        list($anio, $mes, $dia) = explode("-", $fecha);

        ?>
        <!-- FECHA DIA/MES/AÑO -->
        <label style="margin-left: 70mm;margin-top: 38mm;position: absolute;padding: 0"><?php echo $dia;?></label>
        <label style="margin-left: 90mm;margin-top: 38mm;position: absolute;padding: 0"><?php echo $mes;?></label>
        <label style="margin-left: 108mm;margin-top: 38mm;position: absolute;padding: 0"><?php echo $anio;?></label>

        <!-- Datos del Cliente -->

        <!-- CLIENTE --><label style="margin-left: 10mm;margin-top: 46mm;position: absolute;"><?php echo $nombre;?></label>
        <!-- DIRECCION --><label style="margin-left: 13mm;margin-top: 52mm;position: absolute;"><?php echo $direccion ;?></label>
        <!-- NIT O DUI --><input
            style="width:25mm; margin-left: 15mm;margin-top: 58mm;position: absolute;border:none;font-family:Verdana" value='<?php echo $documento ;?>'>
        <!-- VENTA A CUENTA DE especificar que ella pidio aqui dijera si es credito -->
        <label style="margin-left: 80mm;margin-top: 58mm;position: absolute;"><?php echo $procedencia;?></label>

        <!-- Descripcion del producto -->

        <!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
        <label style="margin-left: 9mm;margin-top: 70.5mm;position: absolute;"></label>
        <label style="margin-left: 8mm;margin-top: 72mm;position: absolute;">Valor&nbsp;de&nbsp;la&nbsp;Factura:&nbsp;$<?php echo $monto;?></label>
        <!--label style="margin-left: 70mm;margin-top: 70.5mm;position: absolute;">Letra&nbsp;N°&nbsp;<?php //echo $letra;?></label -->
        <label
            style="margin-left: 8mm;margin-top: 78mm;position: absolute;">Credito&nbsp;N&deg;&nbsp;:&nbsp;$<?php echo $credito;?></label>
        <label style="margin-left: 103mm;margin-top: 70.5mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 70.5mm;position: absolute;"></label>

        <label style="margin-left: 70mm;margin-top: 104mm;position: absolute;"></label>
        <label style="margin-left: 9mm;margin-top: 93mm;position: absolute;">Saldo&nbsp;Anterior:&nbsp;$<?php echo $santerior;?></label>
        <label style="margin-left: 70mm;margin-top: 104mm;position: absolute;"></label>
        <label style="margin-left: 92mm;margin-top: 104mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 104mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 104mm;position: absolute;"></label>

        <!--  Fila 5  -->

        <label style="margin-left: 9mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 9mm;margin-top: 103mm;position: absolute;">Saldo&nbsp;abonado:&nbsp;$<?php echo $sabonado ;?></label>
        <label style="margin-left: 70mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 92mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 110mm;position: absolute;"></label>

        <!--    Fila 6  -->

        <label style="margin-left: 9mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 9mm;margin-top: 109mm;position: absolute;">Saldo&nbsp;Actual:&nbsp;$<?php echo $sactual;?></label>
        <label style="margin-left: 70mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 92mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 116mm;position: absolute;"></label>


        <label style="margin-left: 9mm;margin-top: 141mm;position: absolute;"></label>
        <label style="margin-left: 9mm;margin-top: 130mm;position: absolute;">Intereses:&nbsp;$<?php echo $interes;?></label>
        <label style="margin-left: 70mm;margin-top: 141.5mm;position: absolute;"></label>


        <!-- FILA EXTRA VENTA TOTAl -->

        <label style="margin-left: 103mm;margin-top: 181mm;position: absolute;">$<?php echo $total;?></label>
        </form>

        <script type="text/javascript">
setTimeout(function() {
    window.location.href =
        "<?php echo base_url() . 'index.php/Admin/Transacciones/fconsumidor/' . $data->correlativo; ?>";
}, 5000);
        </script>