<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//require '../mail/vendor/autoload.php';
$cliente=$_POST['cliente'];
include("../conectar.php");
//include('../clases/clases.php');
$password="Vacio";
$factura="Vacio";
$fecha="Vacio";
$accion="Vacio";
$cantidad_transaccion="Vacio";
$saldo_anterior="Vacio";
$cantidad="Vacio";
$usuario="Vacio";
$codigo="Vacio";
$institucion="Vacio";
$factura="Vacio";
$concepto="Vacio";
$numerorecibo="Vacio";
$serie="Vacio";
$caja="Vacio";
$vacioint = 0;
$control = 0;
$vacio = "Vacio";
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
    {
  $_SESSION['empresamail']=$crowem['empresa'];
  //$empresa = $crowem['empresa'];
  $empresa = "Registro de Pago";
  $ruc = $crowem['ruc'];//esto es nuevo ruc
  $logo = $crowem['logo'];
  $direccion = $crowem['direccion'];
  $iva = $crowem['iva'];
  $web = $crowem['web'];
  $tipoAmbiente= $crowem['ambiente'];
  $tipoemision = $crowem['tipoemision'];
  $codigodocumento = $crowem['codigodocumento'];
  //$establecimiento = $crowem['establecimiento'];
  $Oblicontabilidad = $crowem['contabilidad'];
  $colorfondo = $crowem['colorfondo'];
  //#24a5dd

}

if(isset($_POST['facturam']))
{
	$estado = "pendiente";
	$tipofactura = $_POST['tipofactura'];
	$_SESSION['tipofactura']=$tipofactura;
	$valor = $_POST['valor'];
	$url_image = $_POST['url_image'];
	$numerorecibo = $_POST['numerorecibo'];
	$facturagenerada = $_POST['ultimafactura'];
	$institucion = $_POST['institucion'];
	$valorcontrato = $_POST['precio'];
	$accion = $_POST['accion'];
	$total = $_POST['precio'];
	$cantidad = $_POST['valor'];
	$factura = $_POST['factura'];
	//$teleono = $_POST['telefono'];
	$clienteupdate = $_POST['cliente'];
	$cantidad_transaccion = "1";
	$saldo_anterior = "0";
	$concepto = "Pago de Nota";
	$usuario = $_SESSION['password'];
	$id = $_POST['element_1'];
	$_SESSION['id']=$id;
	$password = $id;
	$codigo = $_POST['cliente'];
	$codigoupdate = $_POST['cliente'];
	$telefononuevo = $_POST['telefono'];
	$saldo = $_POST['saldo'];
	$serie = $_POST['serie'];
	$caja = $_POST['caja'];
	$fecha = date("Y-m-d (H:i:s)", time());
	$precio = $_POST['precio'];
  	$facturam = $_POST['facturam'];
  	$contratoa = $_POST['contrato'];
	$totalidad ="0";
	$saldo_pagado = $valor;
	if(isset($_POST['descuento']))
	{
		$descuentovalor = $_POST['descuento'];
			if ($descuentovalor == 0)
			{
				
			}
		else
		{
			$descuento = $_POST['descuento'];
			$saldo = $_POST['descuento'];
			$valor = $_POST['descuento'];
			$cantidad = $_POST['descuento'];
			$valorcontrato = $_POST['descuento'];
			$total = $_POST['descuento'];
			$precio = $_POST['descuento'];
			$subtotalactualizar = $descuento / 1.12;
			$subtotalactualizar = number_format($subtotalactualizar, 2);
			$ivaactualizar = $descuento - $subtotalactualizar;
			$ivaactualizar = number_format($ivaactualizar, 2);
	//ACTUALIZAR DOCUMENTO DESPUES DE DESCUENTO
			$sql = "UPDATE ventas SET total='$valor', preciounitario='$subtotalactualizar', preciototal='$descuento', subtotal='$subtotalactualizar', iva='$ivaactualizar' WHERE id='$id'";
			mysqli_query($con, $sql);
		}
	}
	//HACER Acciones SI LA IMAGEN VIENE DESDE LA APP
	if($url_image != "")
	{
		
		$newLocation = "../clientes/fotos/".$codigo."/".$image;
		$moved = rename($url_image, $newLocation);
		
	}
	
	//FIN DE Acciones SI LA IMAGEN VIENE DESDE LA APP
	//-----buscarsi elcontrato esta cortado para sacar el mensaje de activacion
	$sqlco = "SELECT * from contratos WHERE `numero` LIKE '$contratoa' order by fecha DESC";
	$resultco = mysqli_query($con, $sqlco); 
	while($crowco = mysqli_fetch_assoc($resultco))
           {	
				$cortado = $crowco['cortado'];
				$service_port = $crowco['service_port'];
			}
	if($cortado == "si" )
	{
		$_SESSION['cortado'] = "si";
		echo '<script type="text/javascript">'; 
		echo 'alert("CLIENTE PARA REACTIVACION service-port". $service_port." adminstatus enable ");';
		echo '</script>';
	}
	
	if ($numerorecibo == "Sin_Recibo")
	{
		//---REVISAR SI LA FACTURTA A  COBRAR ES NORMAL CON VARIOS ITEMS O MMENSUAL NORMAL
if($tipofactura == "normal")
{
	$sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero DESC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 $totalidad =$totalidad + $crow3['total'];
				
			}
if($cantidad >= $totalidad)
			{
				$sql31 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero DESC";
				$result31 = mysqli_query($con, $sql31); 
				while($crow31 = mysqli_fetch_assoc($result31))
            	{
				 	$id_numero = $crow31['numero'];
					$corte = "no";
					$tipodocumento = "nota";
					$estado ="cancelado";
					$total_abono = $crow31['total'];
					$sql = "UPDATE ventas SET abono='$total_abono',estado='$estado', numerorecibo='$numerorecibo', tipodocumento='$tipodocumento', serie='$serie', caja='$caja' WHERE numero='$id_numero'";
					mysqli_query($con, $sql);
					//$sqlcon = "UPDATE `contratos` SET cortado='$corte' WHERE numero='$contrato'";
					//mysqli_query($con, $sqlcon);
				}
			
			$sql5 = "SELECT * from cuentas WHERE `numero` LIKE '$institucion'";
			$result5 = mysqli_query($con, $sql5); 
			while($crow5 = mysqli_fetch_assoc($result5))
            	{	
						
					$saldo = $crow5['saldo'];
						
				}
			$saldo = $saldo + $cantidad;
			$sql6 = "UPDATE cuentas SET saldo='$saldo' WHERE numero='$institucion'";
			mysqli_query($con, $sql6);
	
			}
			else
			{
					//abono
				//----busco los registros en venttas
				
				$abono_parcial = $cantidad;
				
				$sql31 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero DESC";
				$result31 = mysqli_query($con, $sql31); 
				while($crow31 = mysqli_fetch_assoc($result31))
            	{
					$id_numero = $crow31['numero'];
					$temporal=$crow31['total'];
					if ($abono_parcial >= $temportal)
					{
						$registro = $crow31['total'];
						$abono_parcial = $abono_parcial-$crow31['total'];
						$sql = "UPDATE ventas SET abono='$registro', numerorecibo='$numerorecibo', serie='$serie', caja='$caja' WHERE numero='$id_numero'";
						mysqli_query($con, $sql);
						
					}
				 	else//--cuando el abono ya no abanza a cancelar la totalidad de registro	
					{
						$sql = "UPDATE ventas SET abono='$abono_parcial', numerorecibo='$numerorecibo', serie='$serie', caja='$caja' WHERE numero='$id_numero'";
						mysqli_query($con, $sql);
					}
				}
			
			$sql5 = "SELECT * from cuentas WHERE `numero` LIKE '$institucion'";
			$result5 = mysqli_query($con, $sql5); 
			while($crow5 = mysqli_fetch_assoc($result5))
            	{	
						
					$saldo = $crow5['saldo'];
						
				}
			$saldo = $saldo + $cantidad;
			$sql6 = "UPDATE cuentas SET saldo='$saldo' WHERE numero='$institucion'";
			mysqli_query($con, $sql6);
				
				
			}
}
	else
{
		$sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by fecha DESC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            			{	
						$contrato=$crow3['contrato'];
						$abono_anterior = $crow3['abono'];
						$mesfactura = $crow3['fecha'];
						list($palabra1, $mes) = explode('-', $mesfactura);

    					$palabra1 . '<br>';

    					$mes . '<br>';
						if ($mes == "01"){ $mes = "Enero";}
						if ($mes == "02"){ $mes = "Febrero";}
						if ($mes == "03"){ $mes = "Marzo";}
						if ($mes == "04"){ $mes = "Abril";}
						if ($mes == "05"){ $mes = "Mayo";}
						if ($mes == "06"){ $mes = "Junio";}
						if ($mes == "07"){ $mes = "Julio";}
						if ($mes == "08"){ $mes = "Agosto";}
						if ($mes == "09"){ $mes = "Septiembre";}
						if ($mes == "10"){ $mes = "Octubre";}
						if ($mes == "11"){ $mes = "Noviembre";}
						if ($mes == "12"){ $mes = "Diciembre";}
						
						}
	$total_abono = $abono_anterior + $valor;
	
	if ($accion == 'pago')
	{
		if($valor >= $saldo)
		{
		$corte = "no";
		$tipodocumento = "nota";
		$estado ="cancelado";
			$sql = "UPDATE ventas SET abono='$total_abono',estado='$estado', numerorecibo='$numerorecibo', tipodocumento='$tipodocumento', serie='$serie', caja='$caja' WHERE id='$id'";
		mysqli_query($con, $sql);
			$sqlcon = "UPDATE `contratos` SET cortado='$corte' WHERE numero='$contrato'";
			mysqli_query($con, $sqlcon);
		//--grabar en tabla para reactivacion
		$sqlp = " INSERT INTO `activar_contrato` ( `contrato`) VALUES ( '$contrato')"; 
		mysqli_query($con, $sqlp);
		}
		else//abono
		{
			
			$sql = "UPDATE ventas SET abono='$total_abono', numerorecibo='$numerorecibo' , serie='$serie', caja='$caja' WHERE id='$id'";
		mysqli_query($con, $sql);
			
	
		}
	 
			
	}
	else
	{
		
		
		
	}
	$sql5 = "SELECT * from cuentas WHERE `numero` LIKE '$institucion'";
			$result5 = mysqli_query($con, $sql5); 
			while($crow5 = mysqli_fetch_assoc($result5))
            			{	
						
						$saldo = $crow5['saldo'];
						
						}
	$saldo = $saldo + $cantidad;
	$sql6 = "UPDATE cuentas SET saldo='$saldo' WHERE numero='$institucion'";
		mysqli_query($con, $sql6);
		
		
		if($estado == "cancelado")
	{
		$_SESSION['cantidad']=$valorcontrato / 1.12;
		$_SESSION['subtotal']=$valorcontrato / 1.12;
		$_SESSION['iva']=($valorcontrato * 12)/100 ;
		$_SESSION['total']=$valorcontrato;
		$_SESSION['producto']="Pago de Servicio de Internet de mes de ".$mes;
	}
	else
	{
		$_SESSION['producto']="Abono mensualidad";
		$_SESSION['iva']=0;
		$_SESSION['total']=$cantidad;
	}
		
} 

$_SESSION['fecha'] = date("Y-m-d (H:i:s)", time());
$_SESSION['cantidad']=$cantidad;
$_SESSION['cliente']=$codigo;
$_SESSION['factura']=$factura;
$_SESSION['subtotal']=$cantidad;
$producto = $_SESSION['producto'];
$producto = $_SESSION['producto'];
$codigoproducto = $_SESSION['id'];

$ivaVentas = $_SESSION['iva']; //agrege
// $Ventasubtotal = $_SESSION['subtotal'];

$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `proveedor`, `producto`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `bodega`, `seccion`, `observacion`) VALUES ( '$password', '$factura', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$codigo', '$institucion', '$factura', '$concepto', '$numerorecibo', '$serie', '$caja', '$vacioint', '$vacio', '$vacio', '$vacio')"; 
mysqli_query($con, $sql);
		

//-- fin de actualizaacion de cliente
		

//if (! $resultado) {
//    echo "Error en la inserción: " . $mysqli->error;
//}
//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente,proveedor, producto, hora, numerorecibo, serie , caja) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//$stmt->bind_param('sssssssssssssss', $password, $factura, $fecha, $accion, $cantidad_transaccion, $saldo_anterior, $cantidad, $usuario, $codigo, $institucion, $factura, $concepto, $numerorecibo, $serie, $caja);
//$stmt->execute();
	}
	else
	{
		$sql36 = "SELECT * from ventas WHERE `numerorecibo` LIKE '$numerorecibo'";
		$result36 = mysqli_query($con, $sql36); 
		while($crow36 = mysqli_fetch_assoc($result36))
            {
				 $nombrecliente = $crow36['nombrecliente'];
				
			}
		$filas = mysqli_num_rows($result36);
            if ($filas >= 1)
			{
				$control = 1;
				?>
				<script type="text/javascript">
				alert("Recibo Ingresado en Otro Cliente <?php echo $nombrecliente?> ");
				</script>
				<meta http-equiv="Refresh" content="1;url=../clientes/productos.php">
				<?php
			}
			else
			{
				//---REVISAR SI LA FACTURTA A  COBRAR ES NORMAL CON VARIOS ITEMS O MMENSUAL NORMAL
if($tipofactura == "normal")
{
	$sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero DESC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 $totalidad =$totalidad + $crow3['total'];
				
			}
if($cantidad >= $totalidad)
			{
				$sql31 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero DESC";
				$result31 = mysqli_query($con, $sql31); 
				while($crow31 = mysqli_fetch_assoc($result31))
            	{
				 	$id_numero = $crow31['numero'];
					$corte = "no";
					$tipodocumento = "nota";
					$estado ="cancelado";
					$total_abono = $crow31['total'];
					$sql = "UPDATE ventas SET abono='$total_abono',estado='$estado', numerorecibo='$numerorecibo', tipodocumento='$tipodocumento', serie='$serie', caja='$caja' WHERE numero='$id_numero'";
					mysqli_query($con, $sql);
					
					if($url_image != "")
					{
						$sql = "UPDATE ventas SET recibo='$url_image' WHERE numero='$id_numero'";
						mysqli_query($con, $sql);
						$ssql = "delete from registro_pagos where url_image='$url_image'";
						if($con->query($ssql)) {
						//echo '<p>Contacto borrado con éxito</p>';
						} else {
  						//echo '<p>Hubo un error al borrar el contaco: ' . $conexion->error . '</p>';
						}
		
					}
					//$sqlcon = "UPDATE `contratos` SET cortado='$corte' WHERE numero='$contrato'";
					//mysqli_query($con, $sqlcon);
				}
			
			$sql5 = "SELECT * from cuentas WHERE `numero` LIKE '$institucion'";
			$result5 = mysqli_query($con, $sql5); 
			while($crow5 = mysqli_fetch_assoc($result5))
            	{	
						
					$saldo = $crow5['saldo'];
						
				}
			$saldo = $saldo + $cantidad;
			$sql6 = "UPDATE cuentas SET saldo='$saldo' WHERE numero='$institucion'";
			mysqli_query($con, $sql6);
	
			}
			else
			{
					//abono
				//----busco los registros en venttas
				
				$abono_parcial = $cantidad;
				
				$sql31 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero DESC";
				$result31 = mysqli_query($con, $sql31); 
				while($crow31 = mysqli_fetch_assoc($result31))
            	{
					$id_numero = $crow31['numero'];
					$temporal=$crow31['total'];
					if ($abono_parcial >= $temportal)
					{
						$registro = $crow31['total'];
						$abono_parcial = $abono_parcial-$crow31['total'];
						$sql = "UPDATE ventas SET abono='$registro', numerorecibo='$numerorecibo', serie='$serie', caja='$caja' WHERE numero='$id_numero'";
						mysqli_query($con, $sql);
						
					}
				 	else//--cuando el abono ya no abanza a cancelar la totalidad de registro	
					{
						$sql = "UPDATE ventas SET abono='$abono_parcial', numerorecibo='$numerorecibo', serie='$serie', caja='$caja' WHERE numero='$id_numero'";
						mysqli_query($con, $sql);
					}
				}
			
			$sql5 = "SELECT * from cuentas WHERE `numero` LIKE '$institucion'";
			$result5 = mysqli_query($con, $sql5); 
			while($crow5 = mysqli_fetch_assoc($result5))
            	{	
						
					$saldo = $crow5['saldo'];
						
				}
			$saldo = $saldo + $cantidad;
			$sql6 = "UPDATE cuentas SET saldo='$saldo' WHERE numero='$institucion'";
			mysqli_query($con, $sql6);
				
				
			}
}
	else
{
		$sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by fecha DESC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            			{	
						$contrato=$crow3['contrato'];
						$abono_anterior = $crow3['abono'];
						$mesfactura = $crow3['fecha'];
						list($palabra1, $mes) = explode('-', $mesfactura);

    					$palabra1 . '<br>';

    					$mes . '<br>';
						if ($mes == "01"){ $mes = "Enero";}
						if ($mes == "02"){ $mes = "Febrero";}
						if ($mes == "03"){ $mes = "Marzo";}
						if ($mes == "04"){ $mes = "Abril";}
						if ($mes == "05"){ $mes = "Mayo";}
						if ($mes == "06"){ $mes = "Junio";}
						if ($mes == "07"){ $mes = "Julio";}
						if ($mes == "08"){ $mes = "Agosto";}
						if ($mes == "09"){ $mes = "Septiembre";}
						if ($mes == "10"){ $mes = "Octubre";}
						if ($mes == "11"){ $mes = "Noviembre";}
						if ($mes == "12"){ $mes = "Diciembre";}
						
						}
	$total_abono = $abono_anterior + $valor;
	
	if ($accion == 'pago')
	{
		if($valor >= $saldo)
		{
		$corte = "no";
		$tipodocumento = "nota";
		$estado ="cancelado";
			$sql = "UPDATE ventas SET abono='$total_abono',estado='$estado', numerorecibo='$numerorecibo', tipodocumento='$tipodocumento', serie='$serie', caja='$caja' WHERE id='$id'";
		mysqli_query($con, $sql);
			$sqlcon = "UPDATE `contratos` SET cortado='$corte' WHERE numero='$contrato'";
			mysqli_query($con, $sqlcon);
		
					if($url_image != "")
					{
						$sql = "UPDATE ventas SET recibo='$url_image' WHERE numero='$id_numero'";
						mysqli_query($con, $sql);
						$ssql = "delete from registro_pagos where url_image='$url_image'";
						if($con->query($ssql)) {
						//echo '<p>Contacto borrado con éxito</p>';
						} else {
  						//echo '<p>Hubo un error al borrar el contaco: ' . $conexion->error . '</p>';
						}
		
					}
		//--grabar en tabla para reactivacion
		$sqlp = " INSERT INTO `activar_contrato` ( `contrato`) VALUES ( '$contrato')"; 
		mysqli_query($con, $sqlp);
		}
		else//abono
		{
			
			$sql = "UPDATE ventas SET abono='$total_abono', numerorecibo='$numerorecibo' , serie='$serie', caja='$caja' WHERE id='$id'";
		mysqli_query($con, $sql);
			
	
		}
	 
			
	}
	else
	{
		
		
		
	}
	$sql5 = "SELECT * from cuentas WHERE `numero` LIKE '$institucion'";
			$result5 = mysqli_query($con, $sql5); 
			while($crow5 = mysqli_fetch_assoc($result5))
            			{	
						
						$saldo = $crow5['saldo'];
						
						}
	$saldo = $saldo + $cantidad;
	$sql6 = "UPDATE cuentas SET saldo='$saldo' WHERE numero='$institucion'";
		mysqli_query($con, $sql6);
		
		
		if($estado == "cancelado")
	{
		$_SESSION['cantidad']=$valorcontrato / 1.12;
		$_SESSION['subtotal']=$valorcontrato / 1.12;
		$_SESSION['iva']=($valorcontrato * 12)/100 ;
		$_SESSION['total']=$valorcontrato;
		$_SESSION['producto']="Pago de Servicio del mes de ".$mes;
	}
	else
	{
		$_SESSION['producto']="Abono ";
		$_SESSION['iva']=0;
		$_SESSION['total']=$cantidad;
	}
		
} 

$_SESSION['fecha'] = date("Y-m-d (H:i:s)", time());
$_SESSION['cantidad']=$cantidad;
$_SESSION['cliente']=$codigo;
$_SESSION['factura']=$factura;
$_SESSION['subtotal']=$cantidad;
$producto = $_SESSION['producto'];
$producto = $_SESSION['producto'];
$codigoproducto = $_SESSION['id'];

$ivaVentas = $_SESSION['iva']; //agrege
// $Ventasubtotal = $_SESSION['subtotal'];

$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `proveedor`, `producto`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `bodega`, `seccion`, `observacion`) VALUES ( '$password', '$factura', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$codigo', '$institucion', '$factura', '$concepto', '$numerorecibo', '$serie', '$caja', '$vacioint', '$vacio', '$vacio', '$vacio')"; 
mysqli_query($con, $sql);

//if (! $resultado) {
//    echo "Error en la inserción: " . $mysqli->error;
//}
//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente,proveedor, producto, hora, numerorecibo, serie , caja) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//$stmt->bind_param('sssssssssssssss', $password, $factura, $fecha, $accion, $cantidad_transaccion, $saldo_anterior, $cantidad, $usuario, $codigo, $institucion, $factura, $concepto, $numerorecibo, $serie, $caja);
//$stmt->execute();
			}
		
	}
	

}
	
//--borrar registro de factura temoporal
	
$query22 = "DELETE FROM documento_reservado WHERE documento = '$factura'";
$result22 = mysqli_query($con, $query22);	



?>  
<?php
if ($control == 0)
{
	

//--BUSCAR CLIENTE PARA MAIL
	$mailactualizar =$_POST['mail'];
	$telefononuevo = $_POST['telefono'];
	//-- actualizacion de clientes
	$sql65 = "UPDATE `clientes` SET mail='$mailactualizar', telefono1='$telefononuevo' WHERE codigo='$clienteupdate'";
	mysqli_query($con, $sql65);

	$sql = "SELECT * from `clientes` WHERE `codigo` LIKE '$cliente' order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						
						$mailcliente = $crow['mail'];
						$nombrescliente = $crow['nombres'];
						$direccioncomprador = $crow['direccion'];

						}
//-- CREAR MAIL DE pago de factura
	
//-- buscar mail e imagenes para el mail
$sql69 = "SELECT * from mail order by mail ASC";
$result69 = mysqli_query($con, $sql69); 
while($crow69 = mysqli_fetch_assoc($result69))
{
	$cuentas = $crow69['nota'];
	$cuentas2 = substr($cuentas, 2);	
	$cuentastexto = $crow69['ip'].$cuentas2;
	$logo = $crow69['nota'];
	$mailenviar = $crow69['mail'];
	$contrasena = $crow69['contrasena'];
}


//crear correo electronico
	
	
	
   //// HTML email starts here
//   
//   $message  = "<html><body>";
//   
//   $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
//   
//   $message .= "<tr><td>";
//   
//   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
//    
//   $message .= "<thead>
//      <tr height='80'>
//       <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >".$empresa."</th>
//      </tr>
//      </thead>";
//    
//   $message .= "<tbody>
//      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
//       <td style='background-color:#00a2d1; text-align:center;'><a style='color:#fff; text-decoration:none;'>Fecha:$fecha</a></td>
//       <td style='background-color:#00a2d1; text-align:center;'><a style='color:#fff; text-decoration:none;'>Nombre:".$nombrescliente."</a></td>
//       <td style='background-color:#00a2d1; text-align:center;'><a style='color:#fff; text-decoration:none;' >Plan:".$producto."</a></td>
//       <td style='background-color:#00a2d1; text-align:center;'><a href='www.megalinkec.com' style='color:#fff; text-decoration:none;' >Realizar pago</a></td>
//      </tr>
//      
//      <tr>
//       <td colspan='4' style='padding:15px;'>
//        <p style='font-size:20px;'>Estimado Cliente su Pago del mes ha sido registrado satisfactoriamente por un valor de ".$total.",</p>
//        <hr />
//        <p style='font-size:25px;'>Mensaje enviado por ".$empresa."</p>
//        <img src='".$cuentastexto."' alt='Imagen' title='No Responder' style='height:auto; width:100%; max-width:100%;' />
//        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'></p>
//       </td>
//      </tr>
//      
//      </tbody>";
//    
//   $message .= "</table>";
//   
//   $message .= "</td></tr>";
//   $message .= "</table>";
//   
//   $message .= "</body></html>";
//   
//   // HTML email ends here
//	
//	$mail = new PHPMailer(true);
//
//try {
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//    $mail->isSMTP();
//    $mail->Host = 'smtp.gmail.com';
//    $mail->SMTPAuth = true;
//    $mail->Username = $mailenviar;
//    $mail->Password = $contrasena;
//    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//    $mail->Port = 587;
//
//    $mail->setFrom($mailenviar, $empresa);
//    $mail->addAddress($mailcliente, 'Receptor');
//    //$mail->addCC('nelo416@yahoo.com');
//
//    $mail->addAttachment($cuentas);
//	$mail->addAttachment($logo);
//
//    $mail->isHTML(true);
//    $mail->Subject = 'Registro de Pago por'." ".$total;
//	//incrustar imagen para cuerpo de mensaje(no confundir con Adjuntar)
//    $mail->AddEmbeddedImage($cuentas, 'imagen'); //ruta de archivo de imagen
//	 $mail->Body    = $message;
//    $mail->AltBody    = $message;
//	
//    $mail->send();
//
//    echo 'Correo enviado';	
//} catch (Exception $e) {
//    echo 'Mensaje ' . $mail->ErrorInfo;
//	
//	
//}
//
////		// registro en registro de acciones
////		$accion = "crear_factura";
////		echo "acceso concedido";
////		$stmt = $con->prepare("INSERT INTO registro ( accion) VALUES (?)");
////		$stmt->bind_param('s', $accion);
////		$stmt->execute();
////		
$subtotalcon = $_SESSION['subtotal']/1.12;
	$subtotalfin = number_format($subtotalcon, 2);
$ivacon = $subtotalfin * $ivadecimal;
// $subtotal = $ivacon;// aqui cambie ojo
$ivacon = number_format($ivacon, 2);
//--------------------CONTABILIZAR
$asiento = "notapago";
$valoruno=$subtotalfin;
$valordos=$ivacon;
$valortres="0";
$valorcuatro="0";
$valorcinco="0";
$valorseis="0";
$valorsiete=$_SESSION['total'];
$valorocho="0";
$valornueve="0";
$valordiez="0";
$valoronce="0";
$valordoce="0";
$descripcion="COBRO MENSUALIDAD/".$nombrescliente."/".$factura."/".$serie."/".$caja;
//asientocontable::asientos($asiento,$descripcion,$valoruno,$valordos,$valortres,$valorcuatro,$valorcinco,$valorseis,$valorsiete,$valorocho,$valornueve,$valordiez,$valoronce,$valordoce);

//-------------------- FIN CONTABILIZAR

////////////////////////////////
if (isset($_GET['codigo'])) {
	$codigo=$_GET['codigo'];
 $_SESSION['codigocliente']=$_GET['codigo'];
}
 $sql = "SELECT * from `ventas` WHERE `numero` LIKE '$codigo' order by fecha DESC";
 $result = mysqli_query($con, $sql); 
 $numfilas = $result->num_rows;
 if ($numfilas >= 2)
		 {
			 $tipofactura = "normal";
		 }
 while($crow = mysqli_fetch_assoc($result))
			 {	
			 $codigo = $crow['id'];
			 $cliente = $crow['cliente'];
			 $total = $total + $crow['total'];
			 $abono = $abono + $crow['abono'];
			 $recibo = $crow['recibo'];
       $subtotal =$crow['preciounitario'];
			 $accion="pago";
		 //echo"este es el producto".	$producto = $crow['producto'];
//echo"este es el id del producto".	$codigoproducto = $crow['id'];


			 }



///////////////////////////


// //--BUSCO la tabla ventas agrege
// $sqlem = "SELECT * from `ventas` order by id DESC";
// $resultadoventas = mysqli_query($con, $sqlem);
// while($crowem = mysqli_fetch_assoc($resultadoventas))
// {
// 	$subtotal = $crowem['subtotal']; // agrege
// echo"esto es iva ventas".  $ivaVentas = $crowem['iva'];  /// agrege

// 	//#24a5dd
// }


 /////////////////////////////// pego el  codigo de generar clave





//date_default_timezone_set("America/Guayaquil");
$dia= date("d");
$mes=date("m");
$ano=date("Y");
    $ultimafactura= $facturam; 
    $unionSerie = $caja.$serie;
    $Calve_Acesso="";
    $fecha_Emision = $dia.$mes.$ano;  
    //  $Tipo_Comprobante ="10"; 
    $Tipo_Comprobante ="01"; // se debe crar una tabla para configurar el tipo
    $Ruc_Empresa =$ruc;
    $Tipo_Ambente =1; // se debe crear una tabla para configurar crud factura
    // $Serie_Factura ="001001";
    $Serie_Factura =$unionSerie; // de 6 digitos
    $Numero_Comprobante = $ultimafactura; // es de 9 digitos y estan 6
    $Codigo_Numerico = 12345678;
    $Tipo_Emision =1; // ese valor es fijo
    $param= $fecha_Emision .$Tipo_Comprobante .$Ruc_Empresa. $Tipo_Ambente
    .$Serie_Factura .$Numero_Comprobante. $Codigo_Numerico. $Tipo_Emision;
  // echo "parametro \n".$parametro;
  $parametro= strrev($param);
  // echo " esta alrevez ".$parametro;
  if (is_numeric($parametro) ) {
   //echo "El numero de la clave es:".  strlen($parametro)."<br>";
  //  strlen($parametro);
  //  echo " es numerico";
   $a = strlen($parametro);
   $totalParametro = 0;
   $factor=2;
   $sum = 0;
   $factor = 2;
   for( $i=0;$i<strlen($parametro); $i++ )
   {
    // echo"se va sumando".$i."+".$parametro;
    // echo"substr".substr( $parametro,$i,1);
    // echo"substr multiplica".substr( $parametro,$i,1)* $factor;
    $sum = $sum + substr( $parametro,$i,1)* $factor;
    // echo" es la suma ".$sum ;
    if ( $factor == 7 ) {
      $factor =2;
    }else{
      $factor++;
    }
   }
  $validador = 11 - ($sum % 11) ;

  if ($validador == 11) {
    $validador=0;
  }
  if ($validador == 10) {
    $validador=1;
  }

$Digito_Verificador = $validador;
//echo " la clave de acseso es: ".$Calve_Acesso = $fecha_Emision .$Tipo_Comprobante .$Ruc_Empresa. $Tipo_Ambente
  //.$Serie_Factura .$Numero_Comprobante. $Codigo_Numerico. $Tipo_Emision.$Digito_Verificador;
  //echo "sub tptal es".$subtotal;
  }
  if (strpos($parametro,'.')) {
   //echo"hay puntos";
  }
 //////////////////////////   hasta aqui



////////// pego codigo de xml


// SELECCIONO MIKROTIK
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
$sqlem = "SELECT * from `mikrotik`";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$host=$crowem['ip'];
	$username=$crowem['usuario'];
	$password=$crowem['contrasena'];
	$corte=$crowem['corte'];
}
if ($corte == "si")
{
//$host = '192.168.2.123';
$port = 22;
//$username = 'admin';
//$password = 'Megalink2020';

if(isset($_POST['contrato']))
{	
	$numero = $_POST['contrato'];
	// SELECCIONAR CONTRATO
	$sql = "SELECT * from `contratos` WHERE `numero` LIKE '$numero'";
	$resultpa = mysqli_query($con, $sql);
	while($crowp = mysqli_fetch_assoc($resultpa))
	{	
		$ip = $crowp['ip'];
	}
// Establecer conexión SSH
$connection = ssh2_connect($host, $port);
if (!$connection) {
    die("No se pudo establecer la conexión SSH.");
}

// Autenticación
if (!ssh2_auth_password($connection, $username, $password)) {
    die("La autenticación SSH falló.");
}

// Ejecutar un comando remoto
$command = '/ip/hotspot/print';
//$command = 'log print';
//$command = ' /ip/firewall/address-list/enable 0';
$command = ' /ip firewall address-list set [ find address='.$ip.' ] disabled=yes';
//$command = ' /ip/firewall/address-list/print';
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);

// Mostrar el resultado
//echo "Resultado del comando: ";
//echo "<br>";
//echo $output;

// Cerrar la conexión SSH
ssh2_disconnect($connection);
	$activado = "si";
$sql = "UPDATE contratos SET activado='$activado' WHERE numero='$numero'";
mysqli_query($con, $sql);
}
}





?>
<meta http-equiv="Refresh" content="1;url=imprimir_recibo.php">
<?php }?>