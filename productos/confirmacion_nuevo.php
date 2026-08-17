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

if(isset($_POST['element_1']))
{
	$accion = $_POST['accion'];
	if($tipoempresacontrol == "isp")
	{
		$metraje = $_POST['metraje'];
		$facturar = $_POST['facturar'];
		$megas = $_POST['megas'];
		$pct = $_POST['pct'];
		
	}
	else
	{
		$metraje = "0";
		$facturar = "no";
		$megas = "0";
		$pct = "0";
	}
	$password = str_replace(' ', '', $_POST['element_1']);
	
	$cantidad = "0";
	$cantidad_transaccion = "0";
	$saldo_anterior = "0";
	$usuario = $_SESSION['password'];
	$id = str_replace(' ', '', $_POST['element_1']);
	$contabilidad = $_POST['contabilidad']; 
	$codigo = $id;
	$producto = $_POST['element_2'];
	$serie = $_POST['serie']; 
	$periodo = $_POST['periodo'];
	$tipo = $_POST['tipo'];
	$preciocompra  = $_POST['preciocompra'];
	$serie_unica = $_POST['serie_unica'];
	//$fechaing = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
	$fechaing = date("Y-m-d (H:i:s)", time());
	$fecha = date("Y-m-d (H:i:s)", time());
	$precio = $_POST['precio'];
	$minimo = $_POST['minimo'];
	$maximo = $_POST['maximo'];
	$vacioint =0;
	$vacio ="Vacio";
	if ($accion == 'nuevo')
	{
		$stmt = $con->prepare("INSERT INTO productos ( id, producto, serie, fechaing , codigo, periodo,precio, metraje, facturar, megass, megasb,tipo, producto_unico, pct,contabilidad, preciocompra, minimo, maximo ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssssssssssssssss', $id, $producto, $serie, $fechaing, $id, $periodo, $precio, $metraje , $facturar,$megas, $megas, $tipo, $serie_unica, $pct, $contabilidad, $preciocompra, $minimo, $maximo);
		$stmt->execute();
	}
	else
	{
		$sql = "UPDATE productos SET codigo='$codigo',serie='$serie',producto='$producto',fechaing='$fechaing',periodo='$periodo', precio='$precio', metraje='$metraje', facturar='$facturar', megass='$megas', megasb='$megas', tipo='$tipo', producto_unico='$serie_unica', pct='$pct', contabilidad='$contabilidad', preciocompra='$preciocompra', minimo='$minimo', maximo='$maximo' WHERE id='$id'";
		mysqli_query($con, $sql);
		
		
	}
} 


$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `producto`, `cliente`, `bodega`, `proveedor`, `hora`, `seccion`, `numerorecibo`, `serviciotecnico`, `observacion`, `serie`, `caja`) VALUES ( '$password', '$password', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$vacio', '$vacio', '$vacio', '$vacio', '$accion', '$vacio', '$vacio', '$vacioint', '$vacio', '$vacio', '$vacio')"; 
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