<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");

	$accion = $_POST['accion'];
	$password = str_replace(' ', '', $_POST['element_1']);
	
	$cantidad = "0";
	$cantidad_transaccion = "0";
	$saldo_anterior = "0";
	$usuario = $_SESSION['password'];
	$id = str_replace(' ', '', $_POST['element_1']);
	$preciouno = $_POST['preciouno'];
	$preciodos = $_POST['preciodos']; 
	$preciotres = $_POST['preciotres'];
	$vacioint =0;
	$vacio ="Vacio";
	
		$sql = "UPDATE productos SET preciouno='$preciouno', preciodos='$preciodos', preciotres='$preciotres' WHERE id='$id'";
		mysqli_query($con, $sql);




//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
//$stmt->bind_param('ssssssss', $password, $password, $fechaing, $accion, $cantidad_transaccion, $saldo_anterior, $cantidad, $usuario);
//$stmt->execute();
//if ($stmt->error)
//	{
//echo '<script type="text/javascript">'; 
//echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");';
// echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
///*echo 'window.location = "../PRODUCTOS/productos.php";';*/
//echo '</script>';
//    }
//    else
//    {
//echo '<script type="text/javascript">'; 
//echo 'alert("REGISTRO DE DATOS CORRECTO");';
//echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
///*echo 'window.location = "../PRODUCTOS/productos.php";';*/
//echo '</script>';
//		
//    }
header("Location: productos.php");

?>  