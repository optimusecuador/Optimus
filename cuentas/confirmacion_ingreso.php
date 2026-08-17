<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");
include('../clases/clases.php');
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
$vacio = "Vacio";
if(isset($_POST['cantidad']))
{
	$tabla = "cuentas";
	$accion = $_POST['accion'];
	$concepto = $_POST['concepto'];
	$documento = $_POST['documento'];
	$id = $_POST['producto'];
	$codigo = $_POST['producto'];
	$cantidad = $_POST['cantidad'];
	$cantidadw = $_POST['cantidad'];
	$valor = $_POST['cantidad'];
	$cantidadunidad="1";
	$cantidad_transaccion = $_POST['cantidad'];
	//--VERIFICAR FECHA PARA REGISTRAR EL DIA CORRECTO
	$fecha = $_POST['fecha'];
	if($fecha == "")
	{
		$fecha = date("Y-m-d (H:i:s)", time());
	}
	$_SESSION['fecha']=$fecha;
	$_SESSION['caja']=$id;
	$_SESSION['fecha']=$fecha;
	$_SESSION['producto']=$concepto;
	$_SESSION['cantidad']=$cantidad;
	$usuario = $_SESSION['password'];
	$sql = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$codigo' order by numero DESC";
	$result = mysqli_query($con, $sql); 
	if ($accion == 'ingreso')
	{
		
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['saldo']+$cantidad;
			$saldo_anterior = $crow['saldo'];
		}
		$asiento ="cuentasingreso";
		$sql = "UPDATE `".$tabla."` SET numero='$codigo',saldo='$cantidad' WHERE id='$id'";
		mysqli_query($con, $sql);
		
		
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`, `accion` , `cantidad`, `saldo`, `usuario`, `proveedor`, `producto`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `bodega`, `seccion`, `observacion`, `saldo_anterior`, `cliente`) VALUES ( '$id', '$codigo', '$fecha', '$accion', '$cantidadunidad', '$valor', '$usuario', '$codigo', '$documento', '$concepto', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio')"; 
		mysqli_query($con, $sql);
		
		
		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo, usuario, proveedor, producto, hora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('ssssssssss', $id, $codigo, $fecha, $accion, $cantidadunidad, $valor, $usuario, $codigo, $documento, $concepto);
//		$stmt->execute();
	}
	else
	{
		
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['saldo']-$cantidad;
			$saldo_anterior = $crow['saldo'];
		}
		$asiento ="cuentasegreso";
		$sql = "UPDATE `".$tabla."` SET numero='$codigo',saldo='$cantidad' WHERE id='$id'";
		mysqli_query($con, $sql);
		
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`, `accion` , `cantidad`, `saldo`, `usuario`, `proveedor`, `producto`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `bodega`, `seccion`, `observacion`, `saldo_anterior`, `cliente`) VALUES ( '$id', '$codigo', '$fecha', '$accion', '$cantidadunidad', '$valor', '$usuario', '$codigo', '$documento', '$concepto', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio')"; 
		mysqli_query($con, $sql);
		
		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo, usuario,proveedor, producto, hora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('ssssssssss', $id, $codigo, $fecha, $accion, $cantidadunidad, $valor, $usuario, $codigo, $documento, $concepto);
//		$stmt->execute();
	//--inicio de whatsapp
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
	$imagen = $crowem['ip'].$crowem['$logow'];
	
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
				
	
			
		$texto = "!!!!!!!!!!Alerta!!!!!!!!!!!!! Se ha registrado un EGRESO de EFECTIVO con Usuario ".$usuario." por concepto de ".$concepto." por un valor de ".$cantidadw." NO RESPONDER ESTE MENSAJE";

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
	

//--------------------CONTABILIZAR
$serie="000";
$caja = "000";
$factura=$documento;
//$asiento = "ventaspendientes";
$valoruno=$valor;
$valordos="0";
$valortres="0";
$valorcuatro="0";
$valorcinco="0";
$valorseis="0";
$valorsiete=$valor;
$valorocho="0";
$valornueve="0";
$valordiez="0";
$valoronce="0";
$valordoce="0";
$descripcion="MOVIMIENTO DE CAJA/".$usuario."/".$documento."/".$serie."/".$caja."/".$concepto;
asientocontable::asientos($asiento,$descripcion,$valoruno,$valordos,$valortres,$valorcuatro,$valorcinco,$valorseis,$valorsiete,$valorocho,$valornueve,$valordiez,$valoronce,$valordoce);

//-------------------- FIN CONTABILIZAR
	
}
 
?>  

<script type="text/javascript">
window.location="imprimir_recibo.php";
</script>