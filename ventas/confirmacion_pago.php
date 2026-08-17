<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$ivadecimal = "0";
$establecimiento = "0";
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
  $empresa = $crowem['empresa'];
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
	$image = $_POST['image'];
	$numerorecibo = $_POST['numerorecibo'];
	$facturagenerada = $_POST['ultimafactura'];
	$institucion = $_POST['institucion'];
	$valorcontrato = $_POST['precio'];
	$accion = $_POST['accion'];
	$total = $_POST['precio'];
	$cantidad = $_POST['valor'];
	$factura = $_POST['factura'];
	$cantidad_transaccion = "1";
	$saldo_anterior = "0";
	$concepto = "Pago de Factura";
	$usuario = $_SESSION['password'];
	$id = $_POST['element_1'];
	$_SESSION['id']=$id;
	$password = $id;
	$codigo = $_POST['cliente'];
	$telefononuevo = $_POST['telefono'];
	$saldo = $_POST['saldo'];
	$serie = $_POST['serie'];
	$caja = $_POST['caja'];
	$fecha = date("Y-m-d (H:i:s)", time());
	$precio = $_POST['precio'];
  $facturam = $_POST['facturam'];
	$totalidad ="0";
	$saldo_pagado = $valor;
	
	//HACER Acciones SI LA IMAGEN VIENE DESDE LA APP
	if($url_image != "")
	{
		
		$newLocation = "../clientes/fotos/".$codigo."/".$image;
		$moved = rename($url_image, $newLocation);
		
	}
	
	//FIN DE Acciones SI LA IMAGEN VIENE DESDE LA APP
	
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
					$tipodocumento = "factura";
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
		$tipodocumento = "factura";
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
//-- actualizacion de clientes
$sqlcon = "UPDATE `clientes` SET telefono1='$telefononuevo' WHERE codigo='$codigo'";
mysqli_query($con, $sqlcon);
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
				</script>';
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
					$tipodocumento = "factura";
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
		$tipodocumento = "factura";
		$estado ="cancelado";
			$sql = "UPDATE ventas SET abono='$total_abono',estado='$estado', numerorecibo='$numerorecibo', tipodocumento='$tipodocumento', serie='$serie', caja='$caja' WHERE id='$id'";
		mysqli_query($con, $sql);
			$sqlcon = "UPDATE `contratos` SET cortado='$corte' WHERE numero='$contrato'";
			mysqli_query($con, $sqlcon);
			
					if($url_image != "")
					{
						$sql = "UPDATE ventas SET recibo='$url_image' WHERE id='$id'";
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
	$sql65 = "UPDATE `clientes` SET mail='$mailactualizar' WHERE codigo='$cliente'";
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
	$cuentas = $crow69['pago'];
	$cuentas2 = substr($cuentas, 2);	
	$cuentastexto = $crow69['ip'].$cuentas2;
	$logo = $crow69['logo'];
	$mailenviar = $crow69['mail'];
	$contrasena = $crow69['contrasena'];
}


////crear correo electronico
//	
//	
//	
//   // HTML email starts here
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
//    $mail->Subject = 'Factura Generada por'." ".$total;
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

//		// registro en registro de acciones
//		$accion = "crear_factura";
//		echo "acceso concedido";
//		$stmt = $con->prepare("INSERT INTO registro ( accion) VALUES (?)");
//		$stmt->bind_param('s', $accion);
//		$stmt->execute();
//		
$subtotalcon = $_SESSION['subtotal']/1.12;
	$subtotalfin = number_format($subtotalcon, 2);
$ivacon = $subtotalfin * $ivadecimal;
// $subtotal = $ivacon;// aqui cambie ojo
$ivacon = number_format($ivacon, 2);
//--------------------CONTABILIZAR
$asiento = "ventaspago";
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
		 $producto = $crow['producto'];
$codigoproducto = $crow['id'];


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
$anno=date("Y");
    $ultimafactura= $facturam; 
    $unionSerie = $caja.$serie;
    $Calve_Acesso="";
    $fecha_Emision = $dia.$mes.$anno;  
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
   strlen($parametro)."<br>";
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
$Calve_Acesso = $fecha_Emision .$Tipo_Comprobante .$Ruc_Empresa. $Tipo_Ambente
  .$Serie_Factura .$Numero_Comprobante. $Codigo_Numerico. $Tipo_Emision.$Digito_Verificador;
  $subtotal;
  }
  if (strpos($parametro,'.')) {
   //echo"hay puntos";
  }
 //////////////////////////   hasta aqui



////////// pego codigo de xml


// Aqui se genera el xml -->

//<?php
$Ventasubtotal=$subtotalfin;
$cedula =$codigo;
 $identificadorComprador=0;
if (strlen($cedula) === 10) {
 $identificadorComprador="05"; //cedula
} else if (strlen($cedula) === 13){
 $identificadorComprador="04";// ruc
}else{
  $identificadorComprador="07";//final
}

// $identificadorComprador=0;
//date_default_timezone_set("America/Guayaquil");
$dia= date("d");
$mes=date("m");
$year=date("Y");
$fechaXml =$dia."/".$mes."/".$year;
//echo"xml a probar";
$subtotal;
// echo "nombre empresa".$empresa;
// crear(); //Creamos el archivo
// leer();  //Luego lo leemos

//Para crear el archivo
// function crear(){
// echo" nombre cliente". $nombres;
  $xml = new DomDocument('1.0', 'UTF-8');
  $xml_fac = $xml-> createElement('factura');
  $cabecera = $xml->createAttribute('id');
  $cabecera->value='comprobante';
  $cabecerav=$xml->createAttribute('version');
  $cabecerav->value='1.00';

  $xml_inf = $xml->createElement('infotributaria');
  $xml_amb = $xml->createElement('ambiente',$tipoAmbiente);
  $xml_tip = $xml->createElement('tipoEmision', $tipoemision);
  $xml_raz = $xml->createElement('razonssocial',$empresa);
  $xml_nom = $xml->createElement('nombrecomercial',$empresa);
  $xml_ruc = $xml->createElement('ruc',$ruc);

  $xml_cla = $xml->createElement('claveAcceso',$Calve_Acesso);
  $xml_doc = $xml->createElement('codDoc',$codigodocumento);
  $xml_est = $xml->createElement('estab',$establecimiento);
  $xml_emi = $xml->createElement('ptoEmi',$caja); 
  $xml_sec = $xml->createElement('secuencial',$Numero_Comprobante);
  $xml_dir = $xml->createElement('DirreccionMatriz',$direccion);

/////////////////
  $xml_def = $xml->createElement('infoFactura');
  $xml_fec = $xml->createElement('fechaEmision',$fechaXml);
  $xml_des = $xml->createElement('dirEstablecimiento',$direccion);
  $xml_obl = $xml->createElement('obligadoContabilidad',$Oblicontabilidad );
  $xml_ide = $xml->createElement('tipoIdentificacionComprador',$identificadorComprador);  
  $xml_rco = $xml->createElement('razonSocialComprador',$nombrescliente);
  $xml_idc = $xml->createElement('identificacionComprador',$codigo );
  $xml_dirc = $xml->createElement('direccionComprador',$direccioncomprador);
  $xml_tsi = $xml->createElement('totalSinImpuetos',$Ventasubtotal);
  $xml_tds = $xml->createElement('totalDescuentos','0.00'); // fijo

///////////aqui estoy programando
  $xml_imp = $xml->createElement('totalConImpuesto');
  $xml_tim = $xml->createElement('totalImpuesto');
  $xml_tco = $xml->createElement('codigo','2'); // fijo Iva
  $xml_cpr = $xml->createElement('codigoPorcentaje','2'); // tambien fijo Iva
  $xml_bas = $xml->createElement('BaseImponible',$Ventasubtotal);
  $xml_val = $xml->createElement('valor', $total);

  $xml_pro = $xml->createElement('propina','0');
  $xml_imt = $xml->createElement('ImporteTotal',$total);
  $xml_mon = $xml->createElement('moneda','DOLAR');//fijo

  $xml_pgs = $xml->createElement('pagos');
  $xml_pag = $xml->createElement('pago');
  $xml_fpa = $xml->createElement('formaPago','01');// solo falta este campo.
  $xml_tot = $xml->createElement('total',$total);
  $xml_pla = $xml->createElement('plazo','0');
  $xml_uti = $xml->createElement('unidadTiempo','dias');//fijo


  $xml_dts = $xml->createElement('detalles');
  $xml_det = $xml->createElement('detalle');
  $xml_cop = $xml->createElement('codigoPrincipal',$codigoproducto);
  $xml_dcr = $xml->createElement('descripcion',$producto);
  $xml_can = $xml->createElement('cantidad','1');
  $xml_pru = $xml->createElement('precioUnitario',$Ventasubtotal);
  $xml_dsc = $xml->createElement('descuento','0.00'); // fijo
  $xml_tsm = $xml->createElement('precioTotalSinImpuetos',$Ventasubtotal);

  $xml_ips = $xml->createElement('impuestos');
  $xml_ipt = $xml->createElement('impuesto');
  $xml_cdg = $xml->createElement('codigo','2');//fijo
  $xml_cpt = $xml->createElement('codigoPorcentaje','2');//fijo
  $xml_ttrf = $xml->createElement('tarifa',$iva);
  $xml_bssi = $xml->createElement('baseImponible',$Ventasubtotal);
  $xml_vlr = $xml->createElement('valor',$ivaVentas);


  $xml_ifa = $xml->createElement('infoAdicional');
  $xml_cp1 = $xml->createElement('campoAdicional',$mailcliente);
  $atributo = $xml->createAttribute('nombre');
   $atributo->value='email';

  
  

  $xml_inf = $xml_fac->appendChild( $xml_inf);
  $xml_amb = $xml_fac->appendChild( $xml_amb);
  $xml_tip = $xml_fac->appendChild( $xml_tip);
  $xml_raz = $xml_fac->appendChild( $xml_raz);
  $xml_nom = $xml_fac->appendChild( $xml_nom);
  $xml_ruc = $xml_fac->appendChild( $xml_ruc);


  $xml_cla = $xml_fac->appendChild( $xml_cla);
  $xml_doc = $xml_fac->appendChild( $xml_doc);
  $xml_est = $xml_fac->appendChild( $xml_est);
  $xml_emi = $xml_fac->appendChild( $xml_emi);
  $xml_sec = $xml_fac->appendChild( $xml_sec);
  $xml_dir = $xml_fac->appendChild( $xml_dir);


  $xml_def = $xml_fac->appendChild( $xml_def);
  $xml_fec = $xml_fac->appendChild( $xml_fec);
  $xml_des = $xml_fac->appendChild( $xml_des);
  $xml_obl = $xml_fac->appendChild( $xml_obl);
  $xml_ide = $xml_fac->appendChild( $xml_ide);
  $xml_rco = $xml_fac->appendChild( $xml_rco);
  $xml_idc = $xml_fac->appendChild( $xml_idc);
  $xml_dirc = $xml_fac->appendChild( $xml_dirc);
  $xml_tsi = $xml_fac->appendChild( $xml_tsi);
  $xml_tds = $xml_fac->appendChild( $xml_tds);

////////////////////////////////////////
  $xml_imp = $xml_fac->appendChild( $xml_imp);
  $xml_tim = $xml_fac->appendChild( $xml_imp);
  $xml_tco = $xml_fac->appendChild( $xml_tco);
  $xml_cpr = $xml_fac->appendChild( $xml_cpr);
  $xml_bas = $xml_fac->appendChild( $xml_bas);
  $xml_val = $xml_fac->appendChild( $xml_val);


  $xml_pro = $xml_fac->appendChild( $xml_pro);
  $xml_imt = $xml_fac->appendChild( $xml_imt);
  $xml_mon = $xml_fac->appendChild( $xml_mon);

  $xml_pgs = $xml_fac->appendChild( $xml_pgs);
  $xml_pag = $xml_fac->appendChild( $xml_pag);
  $xml_fpa = $xml_fac->appendChild( $xml_fpa);
  $xml_tot = $xml_fac->appendChild( $xml_tot);
  $xml_pla = $xml_fac->appendChild( $xml_pla);
  $xml_uti = $xml_fac->appendChild( $xml_uti);


  $xml_dts = $xml_fac->appendChild( $xml_dts);
  $xml_det = $xml_fac->appendChild( $xml_det);
  $xml_cop = $xml_fac->appendChild( $xml_cop);
  $xml_dcr = $xml_fac->appendChild( $xml_dcr);
  $xml_can = $xml_fac->appendChild( $xml_can);
  $xml_pru = $xml_fac->appendChild( $xml_pru);
  $xml_dsc = $xml_fac->appendChild( $xml_dsc);
  $xml_tsm = $xml_fac->appendChild( $xml_tsm);



  $xml_ips = $xml_fac->appendChild( $xml_ips);
  $xml_ipt = $xml_fac->appendChild( $xml_ipt);
  $xml_cdg = $xml_fac->appendChild( $xml_cdg);
  $xml_cpt = $xml_fac->appendChild( $xml_cpt);
  $xml_ttrf = $xml_fac->appendChild( $xml_ttrf);
  $xml_bssi = $xml_fac->appendChild( $xml_bssi);
  $xml_vlr = $xml_fac->appendChild( $xml_vlr);


$xml_fac->appendChild($xml_ifa);
$xml_ifa->appendChild($xml_cp1);
$xml_cp1->appendChild($atributo);
/////////////////////////////////////////
  $xml_fac->appendChild($cabecera);
  $xml_fac->appendChild($cabecerav);
  $xml->appendChild($xml_fac);
  $xml->formatOutput = true;
  $el_xml = $xml->saveXML();
  // $xml->save('../no_firmado'.$Calve_Acesso.'xml');
   $xml->save('../no_firmado/'.$Calve_Acesso.'.xml');
  // $xml->save('../no_firmado/factura201.xml');
  //Mostramos el XML puro
//   echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
//        htmlentities($el_xml)."
// <hr>";
// }


// crea una tabla para guardar nofirmados cedula  nombre de archivo.  con autonumerico  y buscar de forma acendente
//-------------NUEVO CODIGO DE PREGUNTA
	
// SI EL USUARIO ACEPTÓ
if(isset($_GET['accion']) && $_GET['accion']=="activar"){
    
    // CODIGO PHP A EJECUTAR
    //ACTIVAR CONTRATO EN MIKROTIK
	if (function_exists('ssh2_connect')) {
    //echo "La extensión SSH2 está habilitada.";
	//echo "<br>";
} else {
    //echo "La extensión SSH2 no está habilitada.";
}

// SELECCIONO MIKROTIK
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
$sqlem = "SELECT * from `mikrotik`";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$host=$crowem['ip'];
	$username=$crowem['usuario'];
	$password=$crowem['contrasena'];
	
}
//$host = '192.168.2.123';
$port = 22;
//$username = 'admin';
//$password = 'Megalink2020';

if(isset($_POST['numero']))
{	
	$numero = $_POST['numero'];
}
if(isset($_GET['numero']))
{	
	$numero = $_GET['numero'];
}
	// SELECCIONAR CONTRATO
	$sql = "SELECT * from `contratos` WHERE `numero` LIKE '$numero'";
	$resultpa = mysqli_query($con, $sql);
	while($crowp = mysqli_fetch_assoc($resultpa))
	{	
		$ip = $crowp['ip'];
        $corte=$crowp['activado'];
	}
	if ($corte == "no")
{
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
$command = '/ip firewall address-list remove [/ip firewall address-list find list="Suspendido" address='.$ip.']';
//echo $command = ' /ip firewall address-list set [ find address='.$ip.' ] disabled=yes';
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
}

$activado = "si";
$sql = "UPDATE contratos SET activado='$activado' WHERE numero='$numero'";
mysqli_query($con, $sql);
//FIN DE ACTIVACION DE CONTRATO EN MIKROTIK


    echo '
    <script>
        alert("Equipo activado correctamente");
        window.location.href="../ventas/imprimir_recibo.php";
    </script>
    ';
    exit;
}
?>
	<script>

var respuesta = confirm("¿DESEA ACTIVAR EL CONTRATO DEL CLIENTE?");

if(respuesta){
    // ACEPTAR
    window.location.href="confirmacion_pago.php?accion=activar";
}else{
    // CANCELAR
    window.location.href="../ventas/imprimir_recibo.php";
}

</script>
	
<?php


?>
<!--<meta http-equiv="Refresh" content="1;url=imprimir_recibo.php">-->
<?php }?>