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
include('../clases/clases.php');
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
			$colorfondo = $crowem['colorfondo'];
			$carpeta = $crowem['carpeta'];
			$tipoempresacontrol = $crowem['tipoempresa'];
			$ip = $crowem['ip'];
			$actualizacionanterior = $crowem['actualizacion'];
			$ivadecimal =(100+$crowem['iva'])/100;
			//#24a5dd
		}
if(isset($_POST['factura']))
{
	$estado = "pendiente";
	$tipofactura = $_POST['tipofactura'];
	$_SESSION['tipofactura']=$tipofactura;
	$valor = $_POST['valor'];
	$numerorecibo = $_POST['numerorecibo'];
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
	$codigoventa = $_POST['codigoventa'];
	$saldo = $_POST['saldo'];
	$fecha = date("Y-m-d (H:i:s)", time());
	$precio = $_POST['precio'];
	$totalidad ="0";
	$saldo_pagado = $valor;
	$anular = "Incobrable";
	
	$_SESSION['fecha'] = date("Y-m-d (H:i:s)", time());
	$_SESSION['cantidad']=$cantidad;
	$_SESSION['cliente']=$codigo;
	$_SESSION['factura']=$factura;
	$_SESSION['subtotal']=$cantidad;

	//$saldo = $saldo - $cantidad;
//	$sql6 = "DELETE FROM ventas WHERE id = '$factura'";
	$sql6 = "UPDATE ventas SET estado='$anular' WHERE id='$factura'";
	mysqli_query($con, $sql6);
	
	
//-- insertar registro  de anulacion de registro
	
	//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente,proveedor, producto, hora, numerorecibo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//	$stmt->bind_param('sssssssssssss', $password, $factura, $fecha, $accion, $cantidad_transaccion, $saldo_anterior, $total, $usuario, $codigocliente, $institucion, $factura, $concepto, $numerorecibo);
//	$stmt->execute();
	
	


$subtotalcon = $_SESSION['subtotal']/1.12;
$subtotalfin = number_format($subtotalcon, 2);
$ivacon = $subtotalfin * $ivadecimal;
$ivacon = number_format($ivacon, 2);


//-------------------- FIN CONTABILIZAR	
	
}



?>
<script type="text/javascript">
window.location="../clientes/index.php";
</script>