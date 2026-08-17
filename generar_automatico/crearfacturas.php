<?php
date_default_timezone_set('America/Guayaquil');
session_start();

// Corrección de rutas absolutas basadas en __DIR__ para ejecución correcta por Cron en Ubuntu
require(__DIR__ . '/../conectar.php');	

// Carga de PHPMailer usando ruta absoluta para evitar fallos cuando Cron ejecuta el script desde otro directorio
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$tabla = "clientes";
$tabla2 = "productos";
$tabla3 = "contratos";
$estado = "activo";
$mesactual = date("m");
$anoactual = date("Y");
echo $fechaactual =  $anoactual."-".$mesactual;

//--busco empresa y mail
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$_SESSION['empresamail']=$crowem['empresa'];
	$empresa = $crowem['empresa'];
	$logo = $crowem['logo'];
	$iva = $crowem['iva'];
	$ivadecimal=$iva/100;
	$empresamail = $_SESSION['empresamail'];
}

//-- buscar mail y contraseña de Yahoo y la IP/dominio
$mailenviar = "";
$contrasena = "";
$ip_servidor = "";
$logo_mail = "";
$sql69 = "SELECT * from mail order by mail ASC";
$result69 = mysqli_query($con, $sql69); 
while($crow69 = mysqli_fetch_assoc($result69))
{
	$cuentas = $crow69['cuentas'];
	$cuentas2 = substr($cuentas, 2);	
	$cuentastexto = $crow69['ip'].$cuentas2;
	$logo_mail = $crow69['logo']; 
	$ip_servidor = $crow69['ip']; 
	$mailenviar = $crow69['mail'];
	$contrasena = $crow69['contrasena'];
}

$sql = "SELECT * from `contratos` WHERE `estado` LIKE '$estado' order by nombres ASC";
$resulte = mysqli_query($con, $sql); 
while($crowe = mysqli_fetch_assoc($resulte))
{	
	$contrato = $crowe['numero'];
	$codigo = $crowe['numero'];
	$producto = $crowe['producto'];
	$cliente = $crowe['cliente'];
	$direccion = $crowe['direccion'];
	$telefono = $crowe['telefono'];
	$gps1 = $crowe['gps1'];
	$gps2 = $crowe['gps2'];
	$mail = $crowe['mail'];
	$codigorecuperado=$crowe['numero'];
	$diadecorte = $crowe['dia_corte'];
	
	//busqueda de cliente
	$sql = "SELECT * from `clientes` WHERE `codigo` LIKE '$cliente' order by fecha DESC";
	$result = mysqli_query($con, $sql); 
	while($crow = mysqli_fetch_assoc($result))
	{	
		$codigocliente = $crow['codigo'];
		$nombrescliente = $crow['nombres'];
		$apellidoscliente = $crow['apellidos'];
		$direccioncliente = $crow['direccion'];
		$telefonocliente = $crow['telefono1'];
		$telefonow ="+593".ltrim($telefonocliente, "0");
		$telefono2cliente = $crow['telefono2'];
		$mailcliente = $crow['mail'];
		$nombrecliente2 = $crow['nombres'];
	}

	//busqueda de producto
	$codigoproducto = "";
	$valor = 0;
	
	$sql = "SELECT * from `productos` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
	$resultp = mysqli_query($con, $sql); 
	while($crowp = mysqli_fetch_assoc($resultp))
	{	
		$codigoproducto = $crowp['codigo'];
		$producto = $crowp['producto'];
		$valor = $crowp['preciouno'];
	}
	
	if(empty($valor) || $valor <= 0) {
		echo "<br>Contrato $codigorecuperado omitido: El producto no existe o su precio es 0.";
		continue;
	}

	//registro de factura nueva
	$serie ="1";
	$caja ="1";
	$fecha = date("Y-m-d (H:i:s)", time());
	$propietario ="1";
	$ruc ="1";
	$autorizacion ="1";
	$cantidad ="1";
	$preciototal = $cantidad * $valor;
	$subtotal =$preciototal;
	
	$iva =$subtotal * $ivadecimal;
	$iva = number_format($iva, 2);
	$total =$subtotal + $iva;
	$total = number_format($total, 2);
	$total = str_replace ( ",", '', $total);
	$vencimiento ="1";
	$descuento ="1";
	
	$sql6 = "SELECT * from `ventas` WHERE `contrato` LIKE '$codigorecuperado' order by fecha ASC";
	$result6 = mysqli_query($con, $sql6); 
	while($crow6 = mysqli_fetch_assoc($result6))
	{
		$cadena =$crow6['fecha'];
		list($fecha_actual) = explode('(', $cadena);
		$nuevafecha = strtotime ( '+1 month' , strtotime ( $fecha_actual ) ) ;
		$hora = date('h:i:s');
		$anio = date("Y", $nuevafecha);
		$mes = date("m", $nuevafecha);
		$nuevafecha = $anio."-".$mes."-"."01";
		$fecha = $nuevafecha."(".$hora.")";
	}

	$sqlbus = "SELECT * from `ventas` WHERE `contrato` LIKE '$codigorecuperado' AND `fecha` LIKE '%$fechaactual%' order by fecha ASC";
	$resultbus = mysqli_query($con, $sqlbus);
	$filas = $resultbus->num_rows;
	echo "filas de recuperacion ".$filas;

	if($filas >= "1")
	{
	}
	else
	{
		echo "factura generada";
	
		$sql6 = "SELECT * from ventas order by numero ASC";
		$result6 = mysqli_query($con, $sql6); 
		while($crow6 = mysqli_fetch_assoc($result6))
		{
			$numero = $crow6['numero'];
		}
		$numero = $numero+1;
		$id = $numero;
		
		$stmt = $con->prepare("INSERT INTO ventas ( id, serie, caja, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssssssssssssssss', $id, $serie, $caja, $fecha, $propietario, $ruc, $autorizacion, $codigocliente, $codigoproducto, $cantidad, $valor, $preciototal, $subtotal, $iva, $total, $vencimiento, $descuento, $nombrecliente2, $codigo);
		$stmt->execute();
		
		//-- ENVÍO DE CORREO USANDO PHPMailer Y YAHOO SMTP (Adjuntando ambas imágenes correctamente)
		$arroba = "@";
		$pos = strpos($mailcliente, $arroba);

		if ($pos !== false && !empty($mailenviar) && !empty($contrasena)) {
			$diadecortew = $diadecorte - 1;
			$asunto_mail = "Su Factura del Mes - " . $empresa;
			
			$cuerpo_mail = '<div style="font-family: Arial, sans-serif;">';
			$cuerpo_mail .= '<p>Estimado/a ' . $nombrescliente . ',</p>';
			$cuerpo_mail .= '<p>Su factura por un valor total de ' . $total . ' se ha generado satisfactoriamente.<br>';
			$cuerpo_mail .= 'Le recordamos que su fecha máxima de pago es el ' . $diadecortew . ' de cada mes.</p>';
			$cuerpo_mail .= '<p>Atentamente,<br>' . $empresa . '</p>';
			$cuerpo_mail .= '</div>';

			$mail = new PHPMailer(true);
			try {
				$mail->isSMTP();
				$mail->Host       = 'smtp.mail.yahoo.com';                     
				$mail->SMTPAuth   = true;                                     
				$mail->Username   = $mailenviar;                              
				$mail->Password   = $contrasena;                              
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
				$mail->Port       = 587;                                      
				$mail->CharSet    = 'UTF-8';

				$mail->setFrom($mailenviar, $empresa);
				$mail->addAddress($mailcliente, $nombrescliente);
				$mail->addReplyTo($mailenviar, $empresa);

				$mail->isHTML(true);
				$mail->Subject = $asunto_mail;
				$mail->Body    = $cuerpo_mail;

				// 1. Adjuntar la imagen del campo logo de la tabla configuraciones
				if (!empty($logo)) {
					$limpio_logo = ltrim(str_replace(['../', './'], '', $logo), '/');
					$ruta_logo_config = __DIR__ . '/' . $limpio_logo;
					if (file_exists($ruta_logo_config) && is_file($ruta_logo_config)) {
						$ext1 = pathinfo($ruta_logo_config, PATHINFO_EXTENSION);
						$mail->addAttachment($ruta_logo_config, 'logo_empresa.' . ($ext1 ?: 'png'));
					}
				}

				// 2. Adjuntar la imagen cuentas.png desde ../images/cuentas.png
				$ruta_cuentas = __DIR__ . '/../images/cuentas.png';
				if (file_exists($ruta_cuentas) && is_file($ruta_cuentas)) {
					$mail->addAttachment($ruta_cuentas, 'cuentas.png');
				}

				$mail->send();
			} catch (Exception $e) {
				// Opcional: registro de errores en logs si es necesario
			}
		}

		//--PONER CONTRATO EN CORTE AUTOMATICO
		$corte = "si";
		$sqlcon = "UPDATE `contratos` SET cortado='$corte', dia_corte_actual='$diadecorte' WHERE numero='$contrato'";
		mysqli_query($con, $sqlcon);
		
		//--ENVIAR WHATSAPP
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
		{
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
			$telefonooficina = $crowem['telefono'];
			$logoimprecionhojacompleta = $crowem['logoimprecionhojacompleta'];
			$leyendafactura = $crowem['leyendafactura'];
			$firmasrecibo = $crowem['firmasrecibo'];
		}
		$sqlem = "SELECT * from `mail`";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
		{
			$logow = substr($crowem['logo'], 2);
			$imagen = $crowem['ip'].$logow;
		}
		$sqlwa = "SELECT * from `apis`";
		$resulwa = mysqli_query($con, $sqlwa);
		while($crowwa = mysqli_fetch_assoc($resulwa))
		{
			$token = $crowwa['tokenwhatsapp'];
		}
		$diadecortew = $diadecorte - 1;
			
		$texto = "Estimado cliente su Factura de este Mes , A nombre de ".$nombrescliente.", Se ha generado Satisactoriamente, Le recordamos que su fecha maxima de pago es el ".$diadecortew." de cada mes, Para mayor informacion Comunicarse al  ".$telefonooficina." NO RESPONDER ESTE MENSAJE";

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.ultramsg.com/instance16295/messages/image",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "token=$token&to=$telefonow&image=$imagen&caption=$texto&referenceId=hh&nocache=hh",
		  CURLOPTP_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		//--FIN DE WHATSAPP
		
		$subtotalcon = $subtotal / 1.12;
		$subtotalfin = number_format($subtotalcon, 2);
		echo $subtotalfin = str_replace ( ",", '', $subtotalfin);
		$ivacon = $subtotalfin * $ivadecimal;
		$ivacon = number_format($ivacon, 2);

		echo "La factura de ".$nombrecliente2.", Con fecha,".$fecha."<br>";
	}
}

$accion = "crear_factura";
$stmt = $con->prepare("INSERT INTO registro ( accion) VALUES (?)");
$stmt->bind_param('s', $accion);
$stmt->execute();

// Se valida si se ejecuta desde consola (Cron) para evitar errores con window.close()
if (php_sapi_name() !== 'cli') {
    echo '<script>window.close();</script>';
}
?>