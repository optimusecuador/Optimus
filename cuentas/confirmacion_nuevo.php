<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");

if(isset($_POST['element_1']))
{
	$accion = $_POST['accion'];
	$password = str_replace(' ', '', $_POST['element_1']);
	$numero = str_replace(' ', '', $_POST['element_1']);
	
	$cantidad = "0";
	$cantidad_transaccion = "0";
	$saldo_anterior = "0";
	$usuario = $_SESSION['password'];
	$id = $_POST['element_1'];
	
	$nombre = $_POST['element_2'];
	$responsable = $_POST['responsable']; 
	//$periodo = $_POST['periodo'];
	//$fechaing = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
	$fecha = date("Y-m-d (H:i:s)", time());
	//$precio = $_POST['precio'];
	if ($accion == 'nuevo')
	{
		$stmt = $con->prepare("INSERT INTO cuentas ( id, responsable, institucion, numero) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('ssss', $id, $responsable, $nombre, $numero);
		$stmt->execute();
	}
	else
	{
		$sql = "UPDATE cuentas SET responsable='$responsable',institucion='$nombre',numero='$numero' WHERE id='$id'";
		mysqli_query($con, $sql);
		
		
	}
} 
$stmt = $con->prepare("INSERT INTO registro ( fecha, accion , producto, usuario) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $fecha, $accion, $numero, $usuario);
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
echo 'window.location = "productos.php";';
	}
header("Location: ../clientes/index.php");
$stmt->close();
mysqli_close($con);
?>  