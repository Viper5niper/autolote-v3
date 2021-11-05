<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Credito Fiscal</title>
</head>

<body>

        <?php $detalles = $datos->detalles;
        $array = json_decode($detalles);

        foreach ($array as $value => $valor) {
                if ($value == 'nombre') {
                        $nombres = $valor;
                }
                if ($value == 'direccion') {
                        $direccion = $valor;
                }
                if ($value == 'Nregistro') {
                        $registro = $valor;
                }
                if ($value == 'NIT') {
                        $nit = $valor;
                }
                if ($value == 'titulo') {
                        $titulo = $valor;
                }
                if ($value == 'Placa') {
                        $placa = $valor;
                }
                if ($value == 'Marca') {
                        $marca = $valor;
                }
                if ($value == 'Modelo') {
                        $modelo = $valor;
                }
                if ($value == 'Tipo') {
                        $tipo = $valor;
                }
                if ($value == 'Anio') {
                        $anio = $valor;
                }
                if ($value == 'Color') {
                        $color = $valor;
                }
                if ($value == 'procedencia') {
                        $procedencia = $valor;
                }
                if ($value == 'monto') {
                        $monto = $valor;
                }
        }

        $amount = (floatval($monto));
        $sumas = round($amount / 1.13, 2);
        $iva = floor(($sumas * 0.13) * 100) / 100;

        
        $fecha = $datos->fecha;
        list($anio, $mes, $dia) = explode("-",$fecha);
        ?>
        <!-- DATOS GENERALES -->

        <!-- Nombre --><label style="margin-left: 14mm;margin-top: 28mm;position: absolute;"><?php echo $nombres?></label>
        <!-- Direccion --><label style="margin-left: 15.5mm;margin-top: 34mm;position: absolute;"><?php echo $direccion; ?></label>
        <!-- Registro--><input style="margin-left: 117mm;margin-top: 28mm;position: absolute;border:none;font-family:Verdana" value='<?php echo $registro; ?>'>
        <!-- NIT--><input style="margin-left: 105mm;margin-top: 34mm;position: absolute;border:none;font-family:Verdana" value='<?php echo $nit; ?>'>
        <!-- Fecha --><label style="margin-left: 160mm;margin-top: 28mm;position: absolute;"><?php echo $dia . "/" . $mes . "/" . $anio; ?></label>
        <!-- Giro --><label style="margin-left: 160mm;margin-top: 39mm;position: absolute;"></label>
        <!-- Municipio --><label style="margin-left: 24mm;margin-top: 45mm;position: absolute;"></label>
        <!-- Departamento --><label style="margin-left: 80mm;margin-top: 45mm;position: absolute;"></label>
        <!-- n/Remision --><label style="margin-left: 123mm;margin-top: 45mm;position: absolute;"></label>
        <!-- Condiciones de Pago --><label style="margin-left: 174.5mm;margin-top: 39mm;position: absolute;"><?php echo $procedencia; ?></label>

        <!-- DESCRIPCION -->

        <!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
        <label style="margin-left: 9mm;margin-top: 50.5mm;position: absolute;"><?php echo $titulo?></label>
        <label style="margin-left: 9mm;margin-top: 56mm;position: absolute;">Placa:&nbsp;<?php echo $placa; ?></label>
        <label style="margin-left: 9mm;margin-top: 61mm;position: absolute;">Tipo:&nbsp;<?php echo $tipo; ?></label>
        <label style="margin-left: 9mm;margin-top: 67mm;position: absolute;">Marca:&nbsp;<?php echo $marca ?></label>
        <label style="margin-left: 9mm;margin-top: 73mm;position: absolute;">Modelo:&nbsp;<?php echo $modelo ?></label>
        <label style="margin-left: 9mm;margin-top: 79mm;position: absolute;">A&ntilde;o:&nbsp;<?php echo $anio ?></label>
        <label style="margin-left: 9mm;margin-top: 85mm;position: absolute;">Color:&nbsp;<?php echo $color ?></label>
        <!-- fila 6-->
        <label style="margin-left: 135mm;margin-top: 80mm;position: absolute;"></label>
        <label style="margin-left: 155mm;margin-top: 95mm;position: absolute;"></label>
        <label style="margin-left: 165mm;margin-top: 95mm;position: absolute;"></label>
        <label style="margin-left: 176mm;margin-top: 95mm;position: absolute;"></label>
        <label style="margin-left: 135.5mm;margin-top: 77mm;position: absolute;">$<?php echo $monto; ?></label>

        <!-- extras sumas -->

        <label style="margin-left: 165mm;margin-top: 101mm;position: absolute;"></label>
        <label style="margin-left: 176mm;margin-top: 101mm;position: absolute;"></label>
        <label style="margin-left: 174mm;margin-top: 82.5mm;position: absolute;">$<?php echo $sumas; ?></label>

        <!-- IVA --><label style="margin-left: 174mm;margin-top: 87mm;position: absolute;">$<?php echo $iva; ?></label>
        <!-- SUBTOTAL --><label style="margin-left: 174mm;margin-top: 93mm;position: absolute;">$<?php echo $monto; ?></label>
        <!-- IVA RETENIDO --><label style="margin-left: 188mm;margin-top: 119mm;position: absolute;"></label>
        <!-- VENTAS NO SUJETAS --><label style="margin-left: 188mm;margin-top: 125mm;position: absolute;"></label>
        <!-- VENTAS EXENTAS --><label style="margin-left: 176mm;margin-top: 131mm;position: absolute;"></label>
        <!-- TOTAL --><label style="margin-left: 174mm;margin-top: 114.5mm;position: absolute;">$<?php echo $monto; ?></label>

        <script type="text/javascript">
                setTimeout(function() {
                        window.location.href = "<?php echo base_url()."index.php/Admin/Transacciones/creditoventa/".$datos->correlativo?>";
                }, 5000);
        </script>
</body>

</html>