<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");

if(isset($_POST['cantidad']))
{
	$tabla = "cuentas";
	$accion = $_POST['accion'];
	$accion_origen="egreso";
	$id = $_POST['producto'];
	$concepto = $_POST['concepto'];
	$codigo = $_POST['producto'];
	$bodegaorigen = $_POST['producto'];
	$bodegadestino = $_POST['destino'];
	$cantidad = $_POST['cantidad'];
	$cantidadd = $_POST['cantidad'];
	$valor = $_POST['cantidad'];
	$cantidadunidad="1";
	$cantidad_transaccion = $_POST['cantidad'];
	//$fecha = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
	$fecha = date("Y-m-d (H:i:s)", $time);
	$usuario = $_SESSION['password'];
//--BUSCAR LA CUENTA ORIGEN RESTAR Y ACTUALIZAR
	$sql = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$codigo' order by numero DESC";
	$result = mysqli_query($con, $sql); 
	while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['saldo']-$cantidad;
			$saldo_anterior = $crow['saldo'];
		}
		$sql = "UPDATE `".$tabla."` SET numero='$codigo',saldo='$cantidad' WHERE id='$id'";
		mysqli_query($con, $sql);
//--BUSCAR CUENTA DESTINO SUMAR Y ACTUALIZAR
	$sqld = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$bodegadestino' order by numero DESC";
	$resultd = mysqli_query($con, $sqld); 
	while($crowd = mysqli_fetch_assoc($resultd))
    	{	
			$cantidadd = $crowd['saldo']+$cantidadd;
			$saldo_anteriord = $crowd['saldo'];
		}
		$sqld = "UPDATE `".$tabla."` SET numero='$bodegadestino',saldo='$cantidadd' WHERE id='$bodegadestino'";
		mysqli_query($con, $sqld);
	
	
//--CREAR REGISTRO DE EGRESO DE CUENTA INICIAL
	$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo, usuario, proveedor, hora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssssss', $id, $codigo, $fecha, $accion_origen, $cantidadunidad, $valor, $usuario, $codigo, $concepto);
		$stmt->execute();
//--CREAR REGISTRO DEINGRESO DE CUENTA DESTINO
	$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo, usuario, proveedor, hora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssssss', $bodegadestino, $bodegadestino, $fecha, $accion, $cantidadunidad, $valor, $usuario, $bodegadestino, $concepto);
		$stmt->execute();
	
}
mysqli_close($con);
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
/*echo 'window.location = "../PRODUCTOS/productos.php";';*/
echo '</script>';
		header("Location: productos.php");
    }
$stmt->close();
?>  