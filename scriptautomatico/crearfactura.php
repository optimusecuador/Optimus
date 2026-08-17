<?php
date_default_timezone_set('America/Guayaquil');
session_start();
require('../conectar.php');	
//$con=mysqli_connect('localhost','root','Megalink2020.','optimus_demo');
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
//require 'vendor/autoload.php';
//include('../clases/clases.php');
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

//-- buscar mail e imagenes para el mail
$sql69 = "SELECT * from mail order by mail ASC";
$result69 = mysqli_query($con, $sql69); 
while($crow69 = mysqli_fetch_assoc($result69))
{
	$cuentas = $crow69['cuentas'];
	$cuentas2 = substr($cuentas, 2);	
	$cuentastexto = $crow69['ip'].$cuentas2;
	$logo = $crow69['logo'];
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
	//echo  ".";
	
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
						$nombrescliente;
						$mailcliente;
						}
	//busqueda de producto
	$sql = "SELECT * from `productos` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
			$resultp = mysqli_query($con, $sql); 
			while($crowp = mysqli_fetch_assoc($resultp))
            			{	
						

						$codigoproducto = $crowp['codigo'];
						$producto = $crowp['producto'];
						$valor = $crowp['preciouno'];
						//echo $valor ="20
						//$valor;
						//$producto;
						}
	//registro de factura nueva
	//$id ="1";
	//$numero ="1";
	$serie ="1";
	$caja ="1";
	$fecha = date("Y-m-d (H:i:s)", time());
	$propietario ="1";
	$ruc ="1";
	$autorizacion ="1";
	$cantidad ="1";
	$preciototal = $cantidad * $valor;
	$subtotal =$preciototal;
	
	//$_SESSION['subtotal'] = $subtotal;
	$iva =$subtotal * $ivadecimal;
	$iva = number_format($iva, 2);
	$total =$subtotal + $iva;
	$total = number_format($total, 2);
	$total = str_replace ( ",", '', $total);
	$vencimiento ="1";
	$descuento ="1";
	//$facturapdf="../facturaspdf/facturapdf.pdf";
	$logo="../images/logo.png";
	//--buscar ultima factura para sumarle 1 mes

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
	//$filas ="";
	$sqlbus = "SELECT * from `ventas` WHERE `contrato` LIKE '$codigorecuperado' AND `fecha` LIKE '%$fechaactual%' order by fecha ASC";
	$resultbus = mysqli_query($con, $sqlbus);
	$filas = $resultbus->num_rows;
	echo "filas de recuperacion ".$filas;
	//$result6 = mysqli_query($con, $sql6); 
	//while($crow6 = mysqli_fetch_assoc($result6))
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
		//$texto = "Estimado cliente su Factura de este Mes , A nombre de ".$nombrescliente.", Por un valor de ".$total.", se ha generado satisfactoriamente Le recordamos que su fecha maxima de pago es el ".$diadecortew." de cada mes, Para mayor informacion Comunicarse al  ".$telefonooficina." NO RESPONDER ESTE MENSAJE";

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
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

	
	

	//--FIN DE WHATSAPP
	$arroba = "@";
	$pos = strpos($mailcliente, $arroba);

	if ($pos !== false) {
	
	/*//crear correo electronico
		
	
	
	
   // HTML email starts here
   
   $message  = "<html><body>";
   
   $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
   $message .= "<tr><td>";
   
   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
   $message .= "<thead>
      <tr height='80'>
       <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >OPTIMUS s.a.s</th>
      </tr>
      </thead>";
    
   $message .= "<tbody>
      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
       <td style='background-color:#00a2d1; text-align:center;'><a style='color:#fff; text-decoration:none;'>Fecha:$fecha</a></td>
       <td style='background-color:#00a2d1; text-align:center;'><a style='color:#fff; text-decoration:none;'>Nombre:".$nombrescliente."</a></td>
       <td style='background-color:#00a2d1; text-align:center;'><a style='color:#fff; text-decoration:none;' >Plan:".$producto."</a></td>
       <td style='background-color:#00a2d1; text-align:center;'><a href='www.accesnet.com' style='color:#fff; text-decoration:none;' >Realizar pago</a></td>
      </tr>
      
      <tr>
       <td colspan='4' style='padding:15px;'>
        <p style='font-size:20px;'>Estimado Cliente su factura del mes ha sido generada por un valor de ".$total.",</p>
        <hr />
        <p style='font-size:25px;'>Mensaje enviado por OPTIMUS s.a.s.</p>
        <img src='".$cuentastexto."' alt='Imagen' title='No Responder' style='height:auto; width:100%; max-width:100%;' />
        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'></p>
       </td>
      </tr>
      
      </tbody>";
    
   $message .= "</table>";
   
   $message .= "</td></tr>";
   $message .= "</table>";
   
   $message .= "</body></html>";
   
   // HTML email ends here
	
	$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $mailenviar;
    $mail->Password = $contrasena;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($mailenviar, $empresamail);
    $mail->addAddress($mailcliente, 'Receptor');
    //$mail->addCC('nelo416@yahoo.com');

    $mail->addAttachment($cuentas);
	$mail->addAttachment($logo);

    $mail->isHTML(true);
    $mail->Subject = 'Factura Generada por'." ".$total;
	//incrustar imagen para cuerpo de mensaje(no confundir con Adjuntar)
    $mail->AddEmbeddedImage($cuentas, 'imagen'); //ruta de archivo de imagen
	 $mail->Body    = $message;
    $mail->AltBody    = $message;
	
    $mail->send();

    echo 'Correo enviado';		
	
} catch (Exception $e) {
    //echo 'Mensaje ' . $mail->ErrorInfo;
}*/
	
}
	
$subtotalcon = $subtotal / 1.12;
$subtotalfin = number_format($subtotalcon, 2);
echo $subtotalfin = str_replace ( ",", '', $subtotalfin);
$ivacon = $subtotalfin * $ivadecimal;
$ivacon = number_format($ivacon, 2);
//--------------------CONTABILIZAR
$serie="000";
$caja = "000";
$factura="Sin Documento";
$asiento = "ventaspendientes";
$valoruno=$subtotal;
$valordos=$iva;
$valortres="0";
$valorcuatro="0";
$valorcinco="0";
$valorseis="0";
$valorsiete=$total;
$valorocho="0";
$valornueve="0";
$valordiez="0";
$valoronce="0";
$valordoce="0";
$descripcion="GENERAR MENSUALIDAD/".$nombrescliente."/".$factura."/".$serie."/".$caja;
//asientocontable::asientos($asiento,$descripcion,$valoruno,$valordos,$valortres,$valorcuatro,$valorcinco,$valorseis,$valorsiete,$valorocho,$valornueve,$valordiez,$valoronce,$valordoce);

//-------------------- FIN CONTABILIZAR
	

	
echo "La factura de ".$nombrecliente2.", Con fecha,".$fecha."<br>";
		}
	
}
		// registro en registro de acciones
		$accion = "crear_factura";
		//echo "acceso concedido";
		$stmt = $con->prepare("INSERT INTO registro ( accion) VALUES (?)");
		$stmt->bind_param('s', $accion);
		$stmt->execute();




echo '<script>window.close();</script>';
?>