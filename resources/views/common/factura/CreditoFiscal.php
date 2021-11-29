<div class="page-wrapper">

    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Inicio</h5>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <div class="card printableArea">
                    <div class="card-content">
                        <h4><b>CREDITO FISCAL</b> <span class="right">#5669626</span></h4>
                        <hr>
                        <div class="row">
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
                            <div class="col s12">
                                <div class="left">
                                    <p class="m-l-5"><?php echo $nombre;?>
                                        <br /> <?php echo $direccion;?>
                                        <br /> <?php echo $registro;?>
                                        <br /> <?php echo $nit;?>
                                        <br>
                                </div>
                                <div class="right right-align">

                                    <p><b>FECHA :</b> <i class="fa fa-calendar"></i><?php echo " ".$fecha;?></p>
                                    <p><b>Condiciones De Pago</b><?php echo $procedencia;?></p>

                                </div>

                            </div>
                            <div class="col s12">

                                <div class="m-t-40" style="clear: both;">
                                    <table class="table highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th class="center-align">VALOR DE LA FACTURA</th>
                                                <th class="center-align">SALDO ANTERIOR</th>
                                                <th class="center-align">SALDO ABONADO</th>
                                                <th class="center-align">SALDO ACTUAL</th>
                                                <th class="center-align">INTERESES</th>
                                                <th class="center-align">SUMA</th>
                                                <th class="center-align">TOTAL</th>
                                                <th class="center-align">SUMAS</th>
                                                <th class="center-align">IVA</th>
                                                <th class="center-align">SUBTOTAL</th>
                                                <th class="center-align">IVA RETENIDO</th>
                                                <th class="center-align">VENTAS NO SUJETAS</th>
                                                <th class="center-align">VENTAS EXTENTAS</th>
                                                <th class="center-align">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center-align"><?php echo $monto?></td>
                                                <td class="center-align"><?php echo $santerior?></td>
                                                <td class="center-align"><?php echo $sabonado?></td>
                                                <td class="center-align"><?php echo $sactual?></td>
                                                <td class="center-align"><?php echo $interes?></td>
                                                <td class="center-align"><?php echo $suma?></td>
                                                <td class="center-align"><?php echo $total?></td>
                                                <td class="center-align"><?php echo $iva?></td>
                                                <td class="center-align">N/A</td>
                                                <td class="center-align">N/A</td>
                                                <td class="center-align">N/A</td>
                                                <td class="center-align">N/A</td>
                                                <td class="center-align">N/A</td>
                                                <td class="center-align"><?php echo $totales?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="right m-t-30 right-align">

                                    <hr>
                                    <h4><b>Total :</b> $<?php echo $totales?></h4>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="right-align">
                                    <a href="<?php echo base_url().'index.php/Admin/Imprimir/cfiscal/'.$datos->correlativo?>"
                                        class="btn blue accent-4" type="submit">IMPRIMIR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>