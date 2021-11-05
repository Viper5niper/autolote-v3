<!-- DATOS GENERALES -->
<?php $detalles = $datos->detalles;
                            
                            $array = json_decode($detalles);

                            foreach($array as $value => $valor){
                                if($value == 'nombre'){
                                    $nombres = $valor;
                                }
                                if($value == 'direccion'){
                                    $direccion = $valor;
                                }
                                if($value == 'documento'){
                                    $documento = $valor;
                                }
                                if($value == 'NIT'){
                                    $nit = $valor;
                                }
                                if($value == 'Nregistro'){
                                    $registro = $valor;
                                }
                                if($value == 'titulo'){
                                    $titulo = $valor;
                                }
                                if($value == 'credito'){
                                    $credito = $valor;
                                }
                                if($value == 'anterior'){
                                    $santerior = $valor;
                                }
                                if($value == 'abonado'){
                                    $sabonado = $valor;
                                }
                                if($value == 'actual'){
                                    $sactual = $valor;
                                }
                                if($value == 'interes'){
                                    $interes = $valor;
                                }
                                if($value == 'total'){
                                    $total = $valor;
                                }
                                if($value == 'procedencia'){
                                    $procedencia = $valor;
                                }
                                if($value == 'monto'){
                                    $monto = $valor;
                                }

                            }

                            $fecha = $datos->fecha;
                            list($anio, $mes, $dia) = explode("-",$fecha);

                        ?>
<!-- Nombre --><label style="margin-left: 18mm;margin-top: 28mm;position: absolute;"><?php echo $nombre."&nbsp".$apellido; ?></label>
<!-- Direccion --><label style="margin-left: 20mm;margin-top: 34mm;position: absolute;"><?php echo $direccion ; ?></label>
<!-- Registro--><input style="margin-left: 120mm;margin-top: 28mm;position: absolute;border:none;font-family:Verdana" value='<?php echo $ncr ; ?>'>
<!-- NIT--><input style="margin-left: 110mm;margin-top: 34mm;position: absolute;border:none;font-family:Verdana" value='<?php echo $nit ; ?>'>
<!-- Fecha --><label style="margin-left: 160mm;margin-top: 28mm;position: absolute;"><?php echo $dia."/".$mes."/".$anio; ?></label>
<!-- Giro --><label style="margin-left: 160mm;margin-top: 39mm;position: absolute;"></label>
<!-- Municipio --><label style="margin-left: 24mm;margin-top: 45mm;position: absolute;"></label>
<!-- Departamento --><label style="margin-left: 80mm;margin-top: 45mm;position: absolute;"></label>
<!-- n/Remision --><label style="margin-left: 123mm;margin-top: 45mm;position: absolute;"></label>
<!-- Condiciones de Pago --><label style="margin-left: 175.5mm;margin-top: 39mm;position: absolute;"><?php echo $tipo ; ?></label>

<!--    Fila 1   CANT | DESCRIPCION | PRECIO UNITARIO | VENTAS EXENTAS | VENTAS NO SUJETAS | VENTAS GRAVADAS -->
<label style="margin-left: 9mm;margin-top: 65mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 65mm;position: absolute;">Valor&nbsp;de&nbsp;la&nbsp;Factura:&nbsp;$<?php echo $monto; ?></label>
<!--<label style="margin-left: 155mm;margin-top: 65mm;position: absolute;">Letra&nbsp;N°&nbsp;<?php //echo $letra; ?></label>-->
<label style="margin-left: 165mm;margin-top: 65mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 65mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 65mm;position: absolute;"></label>

<!--    Fila 2   -->

<label style="margin-left: 9mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 71mm;position: absolute;">Saldo&nbsp;Anterior:&nbsp;$<?php echo $anterior; ?></label>
<label style="margin-left: 155mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 71mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 71mm;position: absolute;"></label>

<!--    Fila 3   -->

<label style="margin-left: 9mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 77mm;position: absolute;">Saldo&nbsp;abonado:&nbsp;$<?php echo $abon ; ?></label>
<label style="margin-left: 155mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 77mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 77mm;position: absolute;"></label>

<!--    Fila 4   -->

<label style="margin-left: 9mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 83mm;position: absolute;">Saldo&nbsp;Actual:&nbsp;$<?php echo $restante; ?></label>
<label style="margin-left: 155mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 83mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 83mm;position: absolute;"></label>

<!--    Fila 5   -->

<label style="margin-left: 9mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 155mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 165mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 89mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 89mm;position: absolute;"></label>

<!--    Fila 6   -->

<label style="margin-left: 9mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 21mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 155mm;margin-top: 95mm;position: absolute;">Intereses:&nbsp;$<?php echo $inte;?></label>
<label style="margin-left: 165mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 95mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 95mm;position: absolute;"></label>

<!-- extras sumas -->

<label style="margin-left: 165mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 188mm;margin-top: 101mm;position: absolute;">$<?php echo $sum; ?></label>


<label style="margin-left: 135.5mm;margin-top: 77mm;position: absolute;">$<?php echo $total;?></label>

<!-- extras sumas -->

<label style="margin-left: 165mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 176mm;margin-top: 101mm;position: absolute;"></label>
<label style="margin-left: 174mm;margin-top: 82.5mm;position: absolute;">$<?php echo $sumas; ?></label>

<!-- IVA --><label style="margin-left: 174mm;margin-top: 87mm;position: absolute;">$<?php echo $iva;?></label>
<!-- SUBTOTAL --><label style="margin-left: 174mm;margin-top: 93mm;position: absolute;">$<?php echo $total; ?></label>
<!-- IVA RETENIDO --><label style="margin-left: 188mm;margin-top: 119mm;position: absolute;"></label>
<!-- VENTAS NO SUJETAS --><label style="margin-left: 188mm;margin-top: 125mm;position: absolute;"></label>
<!-- VENTAS EXENTAS --><label style="margin-left: 176mm;margin-top: 131mm;position: absolute;"></label>
<!-- TOTAL --><label style="margin-left: 174mm;margin-top: 114.5mm;position: absolute;">$<?php echo $total; ?></label>

        <script type="text/javascript">
                setTimeout(function(){
                window.location.href = "<?php echo base_url()?>index.php/Admin/Transacciones/creditofiscal";
                }, 5000);
        </script>