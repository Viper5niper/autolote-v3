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
                        <h4><b>FACTURA VENTA</b> <span class="right"><?php echo $datos->correlativo;?></span></h4>
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
                                if($value == 'titulo'){
                                    $titulo = $valor;
                                }
                                if($value == 'Placa'){
                                    $placa = $valor;
                                }
                                if($value == 'Marca'){
                                    $marca = $valor;
                                }
                                if($value == 'Modelo'){
                                    $modelo = $valor;
                                }
                                if($value == 'Tipo'){
                                    $tipo = $valor;
                                }
                                if($value == 'Anio'){
                                    $anio = $valor;
                                }
                                if($value == 'Color'){
                                    $color = $valor;
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
                                    <p class="m-l-5"><?php echo $nombres;?>
                                        <br /><?php echo $direccion;?>
                                        <br /><?php echo $documento;?>
                                    </p>
                                    <br>
                                    
                                </div>
                                <div class="right right-align">
                                    <p><b>FECHA :</b> <i class="fa fa-calendar"></i><?php echo " ".$datos->fecha;?></p>
                                </div>
                            </div>
                            <div class="col s12">
                                <p>Venta De Un Vehiculo: </p>
                                <div class="m-t-40" style="clear: both;">
                                    <table class="table highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th class="center-align">PLACA</th>
                                                <th class="center-align">MARCA</th>
                                                <th class="center-align">MODELO</th>
                                                <th class="center-align">AÑO</th>
                                                <th class="center-align">COLOR</th>
                                                <th class="center-align">TIPO</th>
                                                <th class="center-align">MONTO</th>
                                                <th class="center-align">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center-align"><?php echo $placa;?></td>
                                                <td class="center-align"><?php echo $marca;?></td>
                                                <td class="center-align"><?php echo $modelo;?></td>
                                                <td class="center-align"><?php echo $anio;?></td>
                                                <td class="center-align"><?php echo $color;?></td>
                                                <td class="center-align"><?php echo $tipo;?></td>
                                                <td class="center-align"><?php echo $monto;?></td>
                                                <td class="center-align"><?php echo $monto;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="right m-t-30 right-align">

                                    <hr>
                                    <h4><b>Total :</b><?php echo $monto;?></h4>
                                </div>
                                <div class="clearfix"></div>
                                <hr>

                                <?php echo form_open(base_url().'Admin/Imprimir/faventa/'.$datos->correlativo)?>

                                <div class="right-align">
                                    <button class="btn blue accent-4"
                                        type="submit">IMPRIMIR</button>
                                </div>
                                <?php form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>