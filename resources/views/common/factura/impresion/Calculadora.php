<?php 



if (isset($nombre)&& isset($email) && isset($telefono) && isset($monto) && isset($cuotas) && isset($fechas) && isset($interes)) {

$Ncuotas=$cuotas;
$montos=$monto;
$inte=$interes;
$nuevoM=$monto;
$cuotas=$montos/$Ncuotas;
$cuotN=$cuotas/1;
$cuotN= floor($cuotN);
$c=($cuotas-$cuotN)*$Ncuotas;
$sum = $sumtot;

echo "

<title></title>

<header>

</header>
<div style = 'text-align : center;'>  <p ><strong > Nombre del Cliente</strong>: ".$nombre." ". $apellido."
<br><br><strong> Correo Electronico: </strong> ".$email."<strong> Numero de Telefono: </strong> ".$telefono."</p>
<p><strong>Datos de Vehiculo</strong>:</p>
<p><strong> Marca: </strong> ".$marca."&nbsp;<strong> Modelo: </strong> ".$modelo."&nbsp;
<strong> A&ntilde;o: </strong> ".$anio."&nbsp;<strong> Color: </strong>".$color."&nbsp;
<strong> Numero de Placa : </strong>".$placa."&nbsp;
</p>
<p><strong>Cotizaci&oacute;n:</strong>  Monto Otorgado : ".$monto."&nbsp;&nbsp;Interes:
".$inte."%&nbsp;&nbsp; Fecha de Pago: ".$fechas."
</p>";
echo"<br><center><table style='text-align: center; width: 80%' class='striped' border=1 bordercolor=#000000>
	<tr>
	<td width=43 ><b> N&deg; </b></td>
	<td width=117 ><b> Cuota </b></td>
	<td width=156 ><b> Interes </b></td>
	<td width=159 ><b> Monto a Pagar </b></td>
	<td width=114 ><b> Nuevo Saldo </b></td></tr>";
	$interes = 0;
	$cuotas = 0;
	$monto = 0;
	for ($i=1; $i <= $Ncuotas; $i +=1 ) { 
		$interess=$nuevoM*($inte/100);
		$cuotN=floor($cuotN);
		if ($i!=$Ncuotas) {
			$interess=round($interess);
			$nuevoM=$nuevoM-$cuotN;
			$montoapagar=$cuotN+$interess;
			$monto += $montoapagar;
			$montoapagar=ceil($montoapagar);
			$nuevoM = floor($nuevoM);
			$interes += $interess;
			
			$cuotas += $cuotN;
			
			echo"
				<tr>
				<td>$i</td>
				<td>"."$"."$cuotN</td>
				<td>"."$"."$interess</td>
				<td>"."$"."$montoapagar</td>
				<td>"."$"."$nuevoM</td>
				</tr>
";

		}else{
			$interes2=round($interess);
			$ultcuot= $montos - $cuotas;
			$ultcuot=floor($ultcuot);
			$nuevoM=$nuevoM-$ultcuot;
			$nuevoM=ceil($nuevoM);
			$montoapagarf=$ultcuot+$interes2;
			$monto += $montoapagarf;
			$montoapagarf=ceil($montoapagarf);
			$interes += $interes2;
			$monto = ceil($monto);
			//$cuotas += $ultcuot;
			if($sum){
				echo"<tr>
				<td>$i</td>
				<td>"."$"."$ultcuot</td>
				<td>"."$"."$interes2</td>
				<td>"."$"."$montoapagarf</td>
				<td>"."$"."$nuevoM</td>
				</tr>
				<tr>
				<td> </td>
				<td><strong>"."Totales: </strong></td>
				<td><strong>"."$"."$interes </strong></td>
				<td><strong>"."$"."$monto </strong></td>
				<td><strong>"."------ </strong></td>
				</tr>
				</table></center>";

			}else{
				echo"<tr>
				<td>$i</td>
				<td>"."$"."$ultcuot</td>
				<td>"."$"."$interes2</td>
				<td>"."$"."$montoapagarf</td>
				<td>"."$"."$nuevoM</td>
				</tr>
				</table></center>";
			}
			
		}
		


	}
	echo"";
	?>
	<!DOCTYPE html>
	<html>
	<head>

	</head>
	<body>            
	        <script type="text/javascript">
            function imprimir() {
                if (window.print) {
                	document.getElementById("volver").style.opacity="0";
                	document.getElementById("boton").style.opacity="0";
                	document.getElementById("imagen").style.opacity="1";
                    window.print();
                } else {
                    alert("La funciÃ³n de impresion no esta soportada por su navegador.");
                }
            }
        </script>
	<form>
		<br><br>
		<center>
		<div class="row" id="volver"><a href="<?php echo base_url()?>index.php/Admin/Transacciones/presupuesto" class="btn blue accent-4 col s12 m1 l1 offset-l5" type="button" value="Volver"  id="boton">VOLVER</a>
		<a class="btn blue accent-4 col s12 m1 l1 offset-l1" type="submit" onclick="imprimir();" value="Imprimir"  id="boton">IMPRIMIR</a></div></center>
        </div>

	</body>
	</html>
<?php

	return;

}


 ?>