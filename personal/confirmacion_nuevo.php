<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$carpeta = $crowem['carpeta'];
			
		}

if(isset($_POST['submit']))
{
	$accion = $_POST['accion'];
	$password = $_POST['element_1'];
	$cantidad = "0";
	$cantidad_transaccion = "0";
	$saldo_anterior = "0";
	$usuario = $_SESSION['password'];
	$id = $_POST['element_1'];
	$codigo = $_POST['element_1'];
	$nombres = $_POST['element_2'];
	$apellidos = $_POST['apellidos']; 
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$telefono2 = $_POST['telefono2'];
	$mail = $_POST['mail'];
	$puesto = $_POST['puesto'];
	$serie = $_POST['serie'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$fecha = date("Y-m-d (H:i:s)", time());
	$sqls = "SELECT * from `facturero` WHERE `id` LIKE '$serie' order by id DESC";
	$results = mysqli_query($con, $sqls); 
	while($crows = mysqli_fetch_assoc($results))
    {
		$serie = $crows['serie'];
		$caja = $crows['caja'];
	}
	
	//$fecha = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
	if ($accion == 'nuevo')
	{
		$stmt = $con->prepare("INSERT INTO personal ( id, codigo, nombres, apellidos, direccion , telefono1, telefono2, mail, fecha, puesto,serie, caja, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssssssssssss', $id, $codigo, $nombres, $apellidos, $direccion, $telefono, $telefono2, $mail, $fecha, $puesto,$serie, $caja, $usuario, $contrasena);
		$stmt->execute();
		$stmt = $conpersonal->prepare("INSERT INTO usuarios ( usuario, contrasena, carpeta, base_datos) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('ssss', $usuario, $contrasena, $carpeta, $carpeta );
		$stmt->execute();
	}
	else
	{
		$sql = "UPDATE personal SET codigo='$codigo',nombres='$nombres',apellidos='$apellidos',direccion='$direccion',telefono1='$telefono',telefono2='$telefono2',mail='$mail',fecha='$fecha',puesto='$puesto',serie='$serie',caja='$caja',usuario='$usuario',contrasena='$contrasena' WHERE id='$id'";
		mysqli_query($con, $sql);
		
		$sql = "UPDATE usuarios SET contrasena='$contrasena' WHERE usuario='$usuario'";
		mysqli_query($conpersonal, $sql);
		
		
	
	
	}
} 
$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssssss', $password, $password, $fecha, $accion, $cantidad_transaccion, $saldo_anterior, $cantidad, $usuario);
$stmt->execute();
if ($stmt->error)
	{
echo '<script type="text/javascript">'; 
echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");';
 echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
/*echo 'window.location = "../PRODUCTOS/productos.php";';*/
echo '</script>';
    }
    else
    {
echo '<script type="text/javascript">'; 
echo 'alert("REGISTRO DE DATOS CORRECTO");';
echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';

echo '</script>';

    }
header('Location: productos.php');
$stmt->close();
mysqli_close($con);
?>  