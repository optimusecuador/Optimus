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
	$vacio = "Vacio";
	$vacioint = 0;
	$nombre = $_POST['element_2'];
	$principal = $_POST['principal'];
	$responsable = $_POST['responsable']; 
	$tabla = "bodega".$id;
	//$periodo = $_POST['periodo'];
	//$fechaing = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
	$fecha = date("Y-m-d (H:i:s)", time());
	//$precio = $_POST['precio'];
	if ($accion == 'nuevo')
	{
		$stmt = $con->prepare("INSERT INTO bodegas ( id, responsable, nombre, numero, tabla, principal) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssss', $id, $responsable, $nombre, $numero, $tabla, $principal);
		$stmt->execute();
		
$sql = " INSERT INTO `registro` ( `fecha`, `accion`, `producto`, `usuario`,  `bodega`, `cliente`,  `id`,  `cantidad`, `saldo_anterior`, `saldo`, `codigo`, `proveedor`, `hora`, `seccion`, `numerorecibo`, `serviciotecnico`, `observacion`, `serie`, `caja`) VALUES ( '$fecha', '$accion', '$numero', '$usuario', '$tabla', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio')"; 
mysqli_query($con, $sql);
// sql Crea la tabla usando Lenguaje PHP
$sql = "CREATE TABLE `".$tabla."` (
id VARCHAR(255) NOT NULL DEFAULT 'Sin_Asignar',
producto VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
serie VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
fechaing VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
codigo VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
periodo VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
cantidad VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
foto VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
precio VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar',
categoria VARCHAR(50) NOT NULL DEFAULT 'Sin_Asignar'
)";
// Se verifica si la tabla ha sido creado
if ($con->query($sql) === TRUE) {
    echo "la tabla alumnos ha sido creado";
} else {
    echo "Hubo un error al crear la tabla alumnos: " . $conn->error;
}
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
		echo '<script>window.close();</script>';
    }

	}
	else
	{
		$sql = "UPDATE bodegas SET responsable='$responsable',nombre='$nombre',numero='$numero', principal='$principal' WHERE id='$id'";
		mysqli_query($con, $sql);
		
		
	}
} 







//$stmt = $con->prepare("INSERT INTO registro ( fecha, accion , producto, usuario, bodega) VALUES (?, ?, ?, ?, ?)");
//$stmt->bind_param('sssss', $fecha, $accion, $numero, $usuario, $tabla);
//$stmt->execute();






header('Location: productos.php');
?>  