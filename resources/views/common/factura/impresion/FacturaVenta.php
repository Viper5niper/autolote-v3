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
        $fecha = $datos->fecha;
        list($anio, $mes, $dia) = explode("-",$fecha);

        ?>
        <!-- FECHA DIA/MES/AÑO -->
        <label style="margin-left: 70mm;margin-top: 38mm;position: absolute;padding: 0"><?php echo $dia; ?></label>
        <label style="margin-left: 90mm;margin-top: 38mm;position: absolute;padding: 0"><?php echo $mes; ?></label>
        <label style="margin-left: 108mm;margin-top: 38mm;position: absolute;padding: 0"><?php echo $anio; ?></label>
        
        <!-- Datos del Cliente -->

        <!-- CLIENTE --><label style="margin-left: 10mm;margin-top: 46mm;position: absolute;"><?php echo $nombres; ?></label>    
        <!-- DIRECCION --><label style="margin-left: 13mm;margin-top: 52mm;position: absolute;"><?php echo $direccion ; ?></label>
        <!-- NIT O DUI --><input style="width:25mm; margin-left: 15mm;margin-top: 58mm;position: absolute;border:none;font-family:Verdana" value='<?php echo $documento;?>'>
        <!-- VENTA A CUENTA DE especificar que ella pidio aqui dijera si es credito -->
        <label style="margin-left: 80mm;margin-top: 58mm;position: absolute;"><?php echo $tipo ; ?></label>

        <!-- Descripcion del producto -->

        <!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
        <label style="margin-left: 9mm;margin-top: 70.5mm;position: absolute;"></label>
        <label style="margin-left: 8mm;margin-top: 72mm;position: absolute;"><?php echo $titulo;?></label>
        <label style="margin-left: 8mm;margin-top: 78mm;position: absolute;">Placa:&nbsp;<?php echo $placa;?></label>
        <label style="margin-left: 8mm;margin-top: 84mm;position: absolute;">Marca:&nbsp;<?php echo $marca?></label>
        <label style="margin-left: 8mm;margin-top: 90mm;position: absolute;">Modelo:&nbsp;<?php echo $modelo?></label>
        <label style="margin-left: 8mm;margin-top: 96mm;position: absolute;">A&ntilde;o:&nbsp;<?php echo $anio?></label>
        <label style="margin-left: 8mm;margin-top: 102mm;position: absolute;">Color:&nbsp;<?php echo $color ?></label>
        <label style="margin-left: 8mm;margin-top: 109mm;position: absolute;">Tipo:&nbsp;<?php echo $tipo; ?></label>
        

        <!--  Fila 5  --> 

        <label style="margin-left: 9mm;margin-top: 110mm;position: absolute;"></label>
        
        <label style="margin-left: 70mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 92mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 110mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 110mm;position: absolute;"></label>

        <!--    Fila 6  --> 

        <label style="margin-left: 9mm;margin-top: 116mm;position: absolute;"></label>
        
        <label style="margin-left: 70mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 92mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 103mm;margin-top: 116mm;position: absolute;"></label>
        <label style="margin-left: 114mm;margin-top: 116mm;position: absolute;"></label>

        
        <label style="margin-left: 9mm;margin-top: 141mm;position: absolute;"></label>
        <label style="margin-left: 70mm;margin-top: 130mm;position: absolute;">$<?php echo $monto;?></label>
        <label style="margin-left: 70mm;margin-top: 141.5mm;position: absolute;"></label>
        
        
        <!-- FILA EXTRA VENTA TOTAl -->
        
        <label style="margin-left: 100mm;margin-top: 181mm;position: absolute;">$<?php echo $monto ?></label>

        </form>
        <script type="text/javascript">
                setTimeout(function(){
                window.location.href = "<?php echo base_url()."index.php/Admin/Transacciones/fventa/".$datos->correlativo?>";
                }, 5000);
        </script>