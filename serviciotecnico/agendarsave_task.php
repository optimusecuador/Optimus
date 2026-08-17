<?php
date_default_timezone_set('America/Guayaquil');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../mail/vendor/autoload.php';
//$cliente=$_SESSION['cliente'];
include('../conectar.php');
$lat = "0";
$lng = "0";
$ip = "0";
$st = 0;
$registro = "0";
$clientecodigo=$_POST['clientecodigo'];
$mensaje=$_POST['mensaje'];
$producto ="Servicio Tecnico";

$sqlwa = "SELECT * from `apis`";
$resulwa = mysqli_query($con, $sqlwa);
while($crowwa = mysqli_fetch_assoc($resulwa))
{
	$token = $crowwa['tokenwhatsapp'];
	
}				


if (isset($_POST['direccion'])) 
	{
  	$clientenombre = $_POST['productodos'];
	$direccion = $_POST['direccion'];
	$sql6 = "UPDATE clientes SET direccion='$direccion' WHERE codigo='$clientecodigo'";
	mysqli_query($con, $sql6);
	
	}

if (isset($_POST['accion'])) {
  	$accion = $_POST['accion'];
	$cliente = $_POST['productodos'];
	$prioridad = $_POST['prioridad'];
	$caja = $_POST['caja'];
	$contrato = $_POST['contrato'];
	$armadocaja = $_POST['armadocaja'];
	$sqla = "SELECT * from `clientes` WHERE `codigo` LIKE '$clientecodigo' order by fecha DESC";
	$resulta= mysqli_query($con, $sqla); 
	while($crowa = mysqli_fetch_assoc($resulta))
	{	
		$codigo = $crowa['codigo'];
		$mailcliente = $crowa['mail'];
		$nombrescliente = $crowa['nombres'];
		$direccionwa = $crowa['direccion'];
		$telefonowa = $crowa['telefono1']." / ".$crowa['telefono2'];
		$telefonocli = $crowa['telefono1'];
		
				
	}
	$bodega = $_POST['personal'];
	$sqlbo = "SELECT * from `bodegas` WHERE `numero` LIKE '$bodega'";
	$resulbo= mysqli_query($con, $sqlbo); 
	while($crowbo = mysqli_fetch_assoc($resulbo))
	{	
		
		//$telefonowa = $crowpa['telefono'];
		$responsable=$crowbo['responsable'];
		
				
	}
	
	$sqlpa = "SELECT * from `personal` WHERE `codigo` LIKE '$responsable' order by fecha DESC";
	$resulpa= mysqli_query($con, $sqlpa); 
	while($crowpa = mysqli_fetch_assoc($resulpa))
	{	
		
		//$telefonowa = $crowpa['telefono'];
		$telefonowat =$crowpa['telefono1'];
		$telefonowat ="+593".ltrim($telefonowat, "0");
				
	}
	
	
	//$documento = $_POST['documento'];
    $novedades = $_POST['description'];
    $accion=$_POST['accion'];
	$fechacreacion = date("Y-m-d (H:i:s)", time());
	//$fecha = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
	$fecha = $_POST['fecha'];
	$fecha2 = date("Y-m-d",strtotime($fecha."- 1 day"));
	$fecha1 = date("Y-m-d",strtotime($fecha."- 2 month"));
	$contrato = $_POST['contrato'];
	$codigo;//echo "/";
	$sqlreg = "SELECT * from serviciotecnico WHERE (`fecha` BETWEEN '$fecha1' AND '$fecha2') AND (`cliente` LIKE '$codigo')";
	$resultreg = mysqli_query($con, $sqlreg); 
	$numfilas = $resultreg->num_rows;
	
	
	while($crowst = mysqli_fetch_assoc($resultreg))
	{	
		
		$st = $st + 1;
				
	}
	
	if ($numfilas >= 1)
	{
		echo "<script>alert('!!!!!!!!!!El cliente Registra ".$st." Servicios Tecnicos en los 2 ultimos Meses!!!!!!!!!!!');</script>";
		
		
		
//--inicio de whatsapp al administrador
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$_SESSION['empresamail']=$crowem['empresa'];
	$empresa = $crowem['empresa'];
	$logo = $crowem['logo'];
	 $web = $crowem['web'];
	$telefonooficina = $crowem['telefono'];
	$telefonooficina ="+593".ltrim($telefonooficina, "0");
	$logoimprecionhojacompleta = $crowem['logoimprecionhojacompleta'];
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
		
//-------se busca a los administradores para enviar el whatsapp
	$administrador = "admin";
		$sqlpadmin = "SELECT * from `personal` WHERE `puesto` LIKE '$administrador' order by codigo DESC";
	$resulpadmin= mysqli_query($con, $sqlpadmin); 
	while($crowpadmin = mysqli_fetch_assoc($resulpadmin))
	{	
		
		//$telefonowa = $crowpa['telefono'];
		$telefonooficina = $crowpadmin['telefono1'];
		$telefonooficina ="+593".ltrim($telefonooficina, "0");
				
	
			
		$texto = "!!!!!!!!!!Alerta!!!!!!!!!!!!!El cliente ".$nombrescliente." ha registrado ".$st."  servicios tecnicos en los 2 ultimos meses NO RESPONDER ESTE MENSAJE";

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
  		CURLOPT_POSTFIELDS => 	"token=$token&to=$telefonooficina&image=$imagen&caption=$texto&referenceId=hh&nocache=hh",
  		CURLOPT_HTTPHEADER => array( "content-type: application/x-www-form-urlencoded"),
		));

$response = curl_exec($curl);
$err = curl_error($curl);
}
//--fin de whatsapp	
	}
	$estado ="pendiente";
	$_SESSION['cliente']=$cliente;
//-- redgendamiento de servicio
	if($accion == "reagendartodo")
	{
		$registro = $_POST['productodos'];
		$caja = $_POST['caja'];
		$armadocaja = $_POST['armadocaja'];
		$sql6 = "UPDATE clienteasignar SET bodega='$bodega',fecha='$fecha', novedades='$novedades', prioridad='$prioridad',caja='$caja',contrato='$contrato',armadocaja='$armadocaja' WHERE cliente='$registro'";
		mysqli_query($con, $sql6);
				
	}
	else
	{
		//-- buscar en clientes gps y sacvar longitud y latitud
	
	$sqlaa = "SELECT * from `clientegps` WHERE `codigo` LIKE '$codigo' order by nombre DESC";
	$resultaa= mysqli_query($con, $sqlaa); 
	while($crowaa = mysqli_fetch_assoc($resultaa))
	{	
		$lat = $crowaa['lat'];
		$lng = $crowaa['lng'];
		$ip = $crowaa['ip'];
				
	}
	
		//$query = "INSERT INTO clienteasignar(codigo, cliente, fecha, estado, bodega, novedades, prioridad) VALUES ('$codigo', '$cliente', '$fecha', '$estado', '$bodega', '$novedades', '$prioridad')";
		
		
  $caja = $_POST['caja'];
  $armadocaja = $_POST['armadocaja'];
  $query = "INSERT INTO clienteasignar(codigo, cliente, fecha, estado, bodega, novedades, prioridad, lat, lng, ip, caja, contrato, armadocaja) VALUES ('$codigo', '$cliente', '$fecha', '$estado', '$bodega', '$novedades', '$prioridad', '$lat', '$lng', '$ip', '$caja', '$contrato', '$armadocaja')";
  $result = mysqli_query($con, $query);
	}
		
	

  
?>


<?php

//-- CREAR MAIL DE pago de factura
	
//-- buscar mail e imagenes para el mail
$sql69 = "SELECT * from mail order by mail ASC";
$result69 = mysqli_query($con, $sql69); 
while($crow69 = mysqli_fetch_assoc($result69))
{
	$cuentas = $crow69['inicioservicio'];
	$cuentas2 = substr($cuentas, 2);	
	$cuentastexto = $crow69['ip'].$cuentas2;
	$logo = $crow69['logo'];
	$mailenviar = $crow69['mail'];
	$contrasena = $crow69['contrasena'];
	$imagen = $crow69['ip'].$crow69['pago'];
	$imagent = $crow69['ip'].$crow69['logo'];
	
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
//        <p style='font-size:20px;'>Estimado Cliente su Servicio Tecnico ha sido agendado satisfactoriamente,</p>
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
//    $mail->setFrom($mailenviar);
//    $mail->addAddress($mailcliente, 'Receptor');
//    //$mail->addCC('nelo416@yahoo.com');
//
//    $mail->addAttachment($cuentas);
//	$mail->addAttachment($logo);
//
//    $mail->isHTML(true);
//    $mail->Subject = 'Servicio tecnico Agendado';
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
	


//echo '</script>';
//header('Location: agendar.php?accion=agendar');
//echo '<script>window.close();</script>';
  
	
  

}


?>
<?php 
$sqlem = "SELECT * from `mail`";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$logow = substr($crowem['logo'], 2);
	$imagent = $crowem['ip'].$logow;
	
}
$texto = "Estimado instalador su Agendamiento de: ".$novedades." se ha registrado satisfactoriamente , A nombre de: ".$nombrescliente.", en la Direccion: ".$direccionwa." Con Telefono: ".$telefonowa.", Con Fecha: ".$fecha.", Para mayor informacion Comunicarse al  NO RESPONDER ESTE MENSAJE";

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
  CURLOPT_POSTFIELDS => "token=$token&to=$telefonowat&image=$imagent&caption=$texto&referenceId=hh&nocache=hh",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

//inicio de whats app
$cadena_buscada = "Retiro";
$posicion_coincidencia = strrpos($novedades, $cadena_buscada);
if ($posicion_coincidencia === false)

{

//--inicio de whatsapp envio de whatsapp al cliente al inicio de swervicio tecnic
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$_SESSION['empresamail']=$crowem['empresa'];
	$empresa = $crowem['empresa'];
	$logo = $crowem['logo'];
	 $web = $crowem['web'];
	$telefonooficina = $crowem['telefono'];
	$telefonooficina ="+593".ltrim($telefonooficina, "0");
	$logoimprecionhojacompleta = $crowem['logoimprecionhojacompleta'];
}
$sqlem = "SELECT * from `mail`";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$logow = substr($crowem['inicioservicio'], 2);
	$imagen = $crowem['ip'].$logow;
	
}
$sqlwa = "SELECT * from `apis`";
$resulwa = mysqli_query($con, $sqlwa);
while($crowwa = mysqli_fetch_assoc($resulwa))
{
	$token = $crowwa['tokenwhatsapp'];
	
}

		
		//$telefonowa = $crowpa['telefono'];
		$telefonocli = $telefonocli;
		$telefonoocli ="+593".ltrim($telefonocli, "0");
				
	if ($mensaje == "si")
	
	{
	
			
		$texto = "!!!!!!!!!!Aviso!!!!!!!!!!!!!  ".$nombrescliente." suservicio tecnico ha sido generado para el ".$fecha." NO RESPONDER ESTE MENSAJE";

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
  		CURLOPT_POSTFIELDS => 	"token=$token&to=$telefonocli&image=$imagen&caption=$texto&referenceId=hh&nocache=hh",
  		CURLOPT_HTTPHEADER => array( "content-type: application/x-www-form-urlencoded"),
		));

$response = curl_exec($curl);
$err = curl_error($curl);
	}
}

//--fin de whatsapp	



//mysqli_close($con);
unset($_SESSION['nombrecontrato']);
unset($_SESSION['direccioncontrato']);
	?>
<meta http-equiv="Refresh" content="1;url=agendar.php">
