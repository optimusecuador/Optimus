<?php
date_default_timezone_set('America/Guayaquil');
session_start();
include('../conectar.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../mail/vendor/autoload.php';

//recuperar variables
$cliente=$_SESSION['cliente'];

//$tabla2 = "registro";
$tabla = "productos";
$accion=$_POST['accion'];
$absoluta=$_POST['absoluta'];
$id=$_POST['documento'];
$contratocliente = $_POST['documento_contrato'];
$idregistro=$_POST['registro'];
$bodega =$_POST['bodega'];
$clientenombre = $_POST['nombre'];
$codigo = $_POST['cliente'];
$foto1 = $_POST['foto1'];
$foto2 = $_POST['foto2'];
$foto3 = $_POST['foto3'];
$foto4 = $_POST['foto4'];
$motivo = $_POST['motivo'];
$retiro = $_POST['retiro'];
$retiro2 = $_POST['retiro2'];
$retiro3 = $_POST['retiro3'];
$estadoretiro = "retiro";
$productoretiro = $_POST['productoretiro'];
$observaciones = $_POST['observaciones'];
$factura = $_POST['plan'];
$cliente = $_POST['cliente'];
$clientenombre = $_POST['nombre'];
$pagado = $_POST['valor'];
$ip = $_POST['ip'];
$ipgestion = $_POST['ipgestion'];
$nodo = $_POST['nodo'];
$caja = $_POST['caja'];
$puerto = $_POST['puerto'];
$plan = $_POST['plan'];
$longitud = $_POST['longitud'];
$latitud = $_POST['latitud'];
$potencia = $_POST['potencia'];
$personal = $_SESSION['password'];
$tecnico1 = "1";
$tecnico2 = "1";
$tecnico3 = "1";
$tecnico4 = "1";
$usuario = $_SESSION['password'];
$accion = "servicio tecnico";
$bobina = "0";	
$pon = "0";
$borrar = "0";
$fecha = date("Y-m-d (H:i:s)", time());
$router = "0";
$descripcion = "Servicio tecnico sencillo";
$documentot = $_POST['documento'];
$documento = $_POST['documento'];
$registro = $_POST['registro'];
$valor2 = $_POST['valor2'];
$cantidad2 ="";
$saldo ="";
$bodegageneral = "general";
$asunto = $_POST['motivo'];
$numero ="0";
$producto ="0";
$cantidad ="0";
$vacioint = 0;
$vacio = "Vacio";
//-- busco numero de factura  y facturar
$sql62 = "SELECT * from ventas order by numero ASC";
$result62 = mysqli_query($con, $sql62); 
while($crow62 = mysqli_fetch_assoc($result62))
{
	$numero2 = $crow62['numero'];
}
$numero2 = $numero2+1;
$id2 = $numero2;
//--fin debuscar factura
//--BUSCAR DATOS EN CLIENTES PARA WHATSA`PP
$codigo = $_POST['cliente'];
$valor2 = $_POST['valor2'];
$sql = "SELECT * from `clientes` WHERE `codigo` LIKE '$cliente' order by fecha DESC";
$result = mysqli_query($con, $sql); 
while($crow = mysqli_fetch_assoc($result))
	{
		$codigocliente = $crow['codigo'];
		$nombrescliente = $crow['nombres'];
		$apellidoscliente = $crow['apellidos'];
		$direccioncliente = $crow['direccion'];
		$telefonocliente = $crow['telefono1'];
		$telefonocli = $crow['telefono1'];
		$telefono2cliente = $crow['telefono2'];
		$mailcliente = $crow['mail'];
		$nombrecliente2 = $crow['nombres'];
		$nombrescliente;
		$mailcliente;
	}

//--FIN DEBUSQUEDA DE CLIENTES EN WHATSAPP

//-- PROCESAR EL FORMULARIO COMPLETO

if (isset($_POST['observaciones'])) 
{
$clientenombre = $_POST['nombre'];
//-- buscar cliente para mail
	$sqla = "SELECT * from `clientes` WHERE `nombres` LIKE '$clientenombre' order by fecha DESC";
	$resulta= mysqli_query($con, $sqla); 
	while($crowa = mysqli_fetch_assoc($resulta))
	{	
		//$codigo = $crowa['codigo'];
		$mailcliente = $crowa['mail'];
		$nombrescliente2 = $crowa['nombres'];
				
	}
	
	//--PROCESAR RETIRO 1
	if ($retiro != "") 
	{
		$cantidad_transaccion = 1;
		$accion = "ingreso";
		$productoretiro = $_POST['productoretiro'];
		$serieretiro = $_POST['retiro'];
		$bodega4 = "bodega".$_POST['bodega'];
		$bodegaserie = $_POST['bodega'];
		$sql = "SELECT * from `".$bodega4."` WHERE `codigo` LIKE '$productoretiro'";
		$result = mysqli_query($con, $sql);
		if ($accion == 'ingreso')
	//{
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['cantidad']+1;
			$saldo_anterior = $crow['cantidad'];
			//$producto = $crow['producto'];
			$serie = $crow['serie'];
			$periodo = $crow['periodo'];
		}
	//--ACTUALIZAR EN BODEGA CORRESPONDIENTE
		$sql = "UPDATE `".$bodega4."` SET cantidad='$cantidad' WHERE id='$productoretiro'";
		mysqli_query($con, $sql);
	//-- INSERTAR REGISTRO EN REGISTRO
		$bodegaor = $_POST['cliente'];;	
		$bodegabusqueda = "bodega".$bodega;
		$cantidad5 = 1;
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$id', '$productoretiro', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegaor', '$bodegabusqueda', '$idregistro', '$estadoretiro', '$vacio', '$serieretiro', '$vacio', '$vacioint', '$vacio', '$bodegabusqueda', '$vacio')"; 
		mysqli_query($con, $sql);
//--- BUSCAR EN SERIES PARA REASIGNAR			
		$sqlserie = "SELECT * from `series` WHERE `serie` LIKE '$serieretiro'";
		$resultserie = mysqli_query($con, $sqlserie);
		$numfilas = $resultserie->num_rows;
		$numfilas;
		$asignado = "disponible";
		if ($numfilas == 0)
		{
			$estado = "Existencia";
			
			//-- INGRESAR NUMEROS DE SERIE EN TABLA
			$query = "INSERT INTO series(producto, fecha, serie, bodega, estado,asignado) VALUES ('$productoretiro', '$fecha', '$serieretiro', '$bodegaserie', '$estado', '$asignado')";
  			$resulth = mysqli_query($con, $query);
		}
		else
		{
			$sql = "UPDATE `series` SET asignado='$asignado', bodega='$bodegaserie', producto='$productoretiro' WHERE serie='$serieretiro'";
			mysqli_query($con, $sql);
		}
		
			
	}
	//--PROCESAR RETIRO 2
	if ($retiro2 != "") 
	{
		$cantidad_transaccion = 1;
		$accion = "ingreso";
		$productoretiro2 = $_POST['productoretiro2'];
		$serieretiro = $_POST['retiro2'];
		$bodega4 = "bodega".$_POST['bodega'];
		$bodegaserie = $_POST['bodega'];
		$sql = "SELECT * from `".$bodega4."` WHERE `codigo` LIKE '$productoretiro2'";
		$result = mysqli_query($con, $sql);
		if ($accion == 'ingreso')
	//{
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['cantidad']+1;
			$saldo_anterior = $crow['cantidad'];
			//$producto = $crow['producto'];
			$serie = $crow['serie'];
			$periodo = $crow['periodo'];
		}
	//--ACTUALIZAR EN BODEGA CORRESPONDIENTE
		$sql = "UPDATE `".$bodega4."` SET cantidad='$cantidad' WHERE id='$productoretiro2'";
		mysqli_query($con, $sql);
	//-- INSERTAR REGISTRO EN REGISTRO
		$bodegaor = $_POST['cliente'];;	
		$bodegabusqueda = "bodega".$bodega;
		$cantidad5 = 1;
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$id', '$productoretiro2', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegaor', '$bodegabusqueda', '$idregistro', '$estadoretiro', '$vacio', '$serieretiro', '$vacio', '$vacioint', '$vacio', '$bodegabusqueda', '$vacio')"; 
		mysqli_query($con, $sql);
//--- BUSCAR EN SERIES PARA REASIGNAR			
		$sqlserie = "SELECT * from `series` WHERE `serie` LIKE '$serieretiro'";
		$resultserie = mysqli_query($con, $sqlserie);
		$numfilas = $resultserie->num_rows;
		$numfilas;
		$asignado = "disponible";
		if ($numfilas == 0)
		{
			$estado = "Existencia";
			
			//-- INGRESAR NUMEROS DE SERIE EN TABLA
			$query = "INSERT INTO series(producto, fecha, serie, bodega, estado,asignado) VALUES ('$productoretiro2', '$fecha', '$serieretiro', '$bodegaserie', '$estado', '$asignado')";
  			$resulth = mysqli_query($con, $query);
		}
		else
		{
			$sql = "UPDATE `series` SET asignado='$asignado', bodega='$bodegaserie', producto='$productoretiro2' WHERE serie='$serieretiro'";
			mysqli_query($con, $sql);
		}
		
			
	}
	//--PROCESAR RETIRO 3
	if ($retiro3 != "") 
	{
		$cantidad_transaccion = 1;
		$accion = "ingreso";
		$productoretiro3 = $_POST['productoretiro3'];
		$serieretiro = $_POST['retiro3'];
		$bodega4 = "bodega".$_POST['bodega'];
		$bodegaserie = $_POST['bodega'];
		$sql = "SELECT * from `".$bodega4."` WHERE `codigo` LIKE '$productoretiro3'";
		$result = mysqli_query($con, $sql);
		if ($accion == 'ingreso')
	//{
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['cantidad']+1;
			$saldo_anterior = $crow['cantidad'];
			//$producto = $crow['producto'];
			$serie = $crow['serie'];
			$periodo = $crow['periodo'];
		}
	//--ACTUALIZAR EN BODEGA CORRESPONDIENTE
		$sql = "UPDATE `".$bodega4."` SET cantidad='$cantidad' WHERE id='$productoretiro3'";
		mysqli_query($con, $sql);
	//-- INSERTAR REGISTRO EN REGISTRO
		$bodegaor = $_POST['cliente'];;	
		$bodegabusqueda = "bodega".$bodega;
		$cantidad5 = 1;
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$id', '$productoretiro3', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegaor', '$bodegabusqueda', '$idregistro', '$estadoretiro', '$vacio', '$serieretiro', '$vacio', '$vacioint', '$vacio', '$bodegabusqueda', '$vacio')"; 
		mysqli_query($con, $sql);
//--- BUSCAR EN SERIES PARA REASIGNAR			
		$sqlserie = "SELECT * from `series` WHERE `serie` LIKE '$serieretiro'";
		$resultserie = mysqli_query($con, $sqlserie);
		$numfilas = $resultserie->num_rows;
		$numfilas;
		$asignado = "disponible";
		if ($numfilas == 0)
		{
			$estado = "Existencia";
			
			//-- INGRESAR NUMEROS DE SERIE EN TABLA
			$query = "INSERT INTO series(producto, fecha, serie, bodega, estado,asignado) VALUES ('$productoretiro3', '$fecha', '$serieretiro', '$bodegaserie', '$estado', '$asignado')";
  			$resulth = mysqli_query($con, $query);
		}
		else
		{
			$sql = "UPDATE `series` SET asignado='$asignado', bodega='$bodegaserie', producto='$productoretiro3' WHERE serie='$serieretiro'";
			mysqli_query($con, $sql);
		}
		
			
	}
		
	
	
//-- PROCESAR FORMULARIO SI EXISTE COSTO DE SERVICIO TECNICO CON COSTO  QUE INGRESA EEL TECNINCO

if ($valor2 != "") 
		{
$serviciotecnico = $_POST['valor2'];			
$tabla = "clientes";
//$tabla2 = "productos";
$estado = "activo";
$codigo = $_POST['cliente'];
$valor2 = $_POST['valor2'];
$sql = "SELECT * from `clientes` WHERE `codigo` LIKE '$cliente' order by fecha DESC";
$result = mysqli_query($con, $sql); 
while($crow = mysqli_fetch_assoc($result))
	{
		$codigocliente = $crow['codigo'];
		$nombrescliente = $crow['nombres'];
		$apellidoscliente = $crow['apellidos'];
		$direccioncliente = $crow['direccion'];
		$telefonocliente = $crow['telefono1'];
		$telefonocli = $crow['telefono1'];
		$telefono2cliente = $crow['telefono2'];
		$mailcliente = $crow['mail'];
		$nombrecliente2 = $crow['nombres'];
		$nombrescliente;
		$mailcliente;
	}
	$codigoproducto = "99999999";
	$producto = "Servicio Tecnico";
	$valor = $_POST['valor2'];
	$serie ="1";
	$numero ="0";
	//$caja ="1";
	$fecha = date("Y-m-d (H:i:s)", time());
	$propietario ="1";
	$ruc ="1";
	$autorizacion ="1";
	$cantidad = 1;
	$preciototal =$cantidad * $valor;
	//$preciototal2 =$cantidad * $valor;
	$subtotal =$preciototal;
	$iva =$subtotal * $ivadecimal;
	$total =$subtotal + $iva;
	$vencimiento ="1";
	$descuento ="1";
	//$facturapdf="../facturaspdf/facturapdf.pdf";
	$logo="../images/logo.png";
	$sql6 = "SELECT * from ventas order by numero ASC";
	$result6 = mysqli_query($con, $sql6); 
			while($crow6 = mysqli_fetch_assoc($result6))
            			{
						$numero = $crow6['numero'];
						}
	$numero = $numero+1;
	$id = $numero;
	//--GENERO LA VENTA DE SERVICIO TECNICO CUANDO SE INGRESA VALOR DE SERVICIO TECNICO CON PRODUCTO COMO SERVICIO TECNICO
	$stmt = $con->prepare("INSERT INTO ventas ( id, serie, caja, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente,  contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param('sssssssssssssssssss', $id, $serie, $caja, $fecha, $propietario, $ruc, $autorizacion, $codigocliente, $codigoproducto, $cantidad, $valor, $preciototal, $subtotal, $iva, $total, $vencimiento, $descuento, $nombrecliente2,  $documentot);
	$stmt->execute();

		// registro en registro de acciones LA ACCION DE SERVICIO TECNICO CON VALOR PERSONALIZADO
		$accion = "crear_factura";
		//echo "acceso concedido";
	
	
		$sql = " INSERT INTO `registro` (`accion`, `cliente`, `fecha`, `id`, `producto`,  `cantidad`, `saldo_anterior`, `saldo`, `usuario`,  `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$accion', '$cliente', '$fecha', '$registro', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$idregistro', '$vacio', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$vacio', '$vacio')"; 
		mysqli_query($con, $sql);	
	
	
		//$stmt = $con->prepare("INSERT INTO registro ( accion, cliente, fecha) VALUES (?, ?, ?)");
//		$stmt->bind_param('sss', $accion, $cliente, $fecha);
//		$stmt->execute();
		
	//----INSERTAR REGISTRO DE SERVICIO TECNICO
		$stmt = $con->prepare("INSERT INTO serviciotecnico ( id, numero, fecha, foto1 , foto2, foto3, foto4, cliente, pagado, ip, router, producto, bobina, plan, longitud, latitud, potencia, pon, descripcion, cantidad, personal, tecnico1, tecnico2, tecnico3, tecnico4, factura, observacion, motivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param('ssssssssssssssssssssssssssss', $id, $contratocliente, $fecha, $foto1, $foto2, $foto3, $foto4, $cliente, $pagado, $ip, $router, $producto, $bobina, $plan, $longitud, $latitud, $potencia, $pon,$descripcion, $cantidad, $personal, $tecnico1, $tecnico2, $tecnico3, $tecnico4, $factura, $observaciones, $motivo);
		$stmt->execute();
//----INSERTAR REGISTRO EN REGISTRO
	
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`,`accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`,`cliente` , `producto`,  `bodega`,  `hora`, `numerorecibo`,`serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad2', '$saldo', '$personal', '$cliente', '$producto', '$bodegageneral', '$vacio', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$bodegageneral', '$vacio')"; 
		mysqli_query($con, $sql);
	
	
	

		//$stmt = $con->prepare("INSERT INTO registro ( id-, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('sssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad2, $saldo, $personal, $cliente, $producto, $bodegageneral);
//		$stmt->execute();
	
	
		//echo $codigo;
		$query22 = "DELETE FROM clienteasignar WHERE codigo = '$codigo'";
		$result22 = mysqli_query($con, $query22);
		//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO con valor personalizado
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);		
	
	
		}
		else
		{
			$serviciotecnico = "";
		}	
	
//--buscar cliente	
	
			$clientecod= $_POST['cliente'];
			$ruc= $_POST['cliente'];
			$codigocliente2=$_POST['cliente'];
			$nombrecliente2=$_POST['nombre'];
			$contrato2=$_POST['documento'];
			$propietario ="1";
			$serie ="1";
			//$caja ="1";
			$autorizacion ="1";
//-- bussco cliente en cliente assignar opara sacar si es cambio de domicilio o que hace 
			$sql33 = "SELECT * from `clienteasignar` WHERE `codigo` LIKE '%$clientecod%' order by fecha DESC";
			$result33 = mysqli_query($con, $sql33);
			while($crow33 = mysqli_fetch_assoc($result33)) 
			{
				
///-- comparo si existe cambio de domicilio  ccon las novedades
				$asunto = $crow33['novedades'];
				$armadocaja = $crow33['armadocaja'];
				//if (strpos($asunto, 'Cambio de Domicilio') !== false) 
//				{
//					//-- busco numero de factura  para  cambio de domicilio y facturar
//    				$sql62 = "SELECT * from ventas order by numero ASC";
//					$result62 = mysqli_query($con, $sql62); 
//					while($crow62 = mysqli_fetch_assoc($result62))
//            		{
//						$numero2 = $crow62['numero'];
//					}
//					$numero2 = $numero2+1;
//					$id2 = $numero2;
//					//--buscar productos para la factura de cambio de domicilio en barrido de prooduccto de serviviciuo tecnico
//					$sql3 = "SELECT * from `tempserviciotecnico` WHERE `personal` LIKE '$bodega' order by created_at DESC";
//					$result3 = mysqli_query($con, $sql3);
//					while($crow3 = mysqli_fetch_assoc($result3))
//            			{
//						$producto2 = $crow3['producto'];
//						$codigoproducto2 = $crow3['producto'];
//						$cantidad2 = $crow3['cantidad'];
//						$preciofacturar = $crow3['preciouno'];
//						$precio2 = $crow3['preciouno'];
//						
//						
//					/////-- busco el producto para saber el precio
////						$sql88 = "SELECT * from `productos` WHERE `codigo` LIKE '$producto2'";
////						$result88 = mysqli_query($con, $sql88);
////						while($crowl8 = mysqli_fetch_assoc($result88))
////						{
////							echo $facturacion = $crowl8['facturar'];
////							if ($facturacion == "si")
////							{
////								//$precio2 = $crowl8['preciouno'];
////								$precio2 = $crow3['preciouno'];
////							}
////							else
////							{
////								$precio2 = 0;
////							}
////							
////						
////						}
//						if ($precio2 == "Sin_Facturar")
//						{
//							$precio2 = 0;
//						}
//						//--GRABAR EN VENTAS
//						
//						$preciototal2 =$cantidad2 * $precio2;
//						$preciototal2 = number_format($preciototal2, 2);
//						$subtotal2 =$preciototal2;
//						$iva2 =$subtotal2 * $ivadecimal;
//						$iva2 = number_format($iva2, 2);
//						$total2 =$subtotal2 + $iva2;
//						$total2 = number_format($total2, 2);
//						$total2 =$subtotal2 + $iva2;
//						$vencimiento ="1";
//						$descuento ="1";
//						$borrar = $crow3['id'];
//						$documento = $crow3['title'];
//						$id = $crow3['title'];
//						$serie = $crow3['serie'];
//						$numero = $crow3['title'];
//						$bodegabuscar = "bodega".$bodega;
//						$producto = $crow3['producto'];
//						$descripcion = $crow3['description'];
//						$cantidad = $crow3['cantidad'];
//						$observacion = $crow3['description'];
//						
//						if ($precio2 != "Sin_Facturar")
//						{
//							$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
//							$stmt->bind_param('ssssssssssssssssss', $id2, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidad2, $precio2, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
//							$stmt->execute();
//						}
//						
//						
//						//actualizar latitud y longitud para graficar
//						$sql66 = "UPDATE `clientegps` SET lat='$latitud', lng='$longitud', ip='$ip', ipgestion='$ipgestion', nodo='$nodo' WHERE codigo='$cliente'";
//		 				mysqli_query($con, $sql66);
//						//--ACTUALIZAR CANTIDAD DE INVENTARIO GENERAL
//						$producto;
//						$cantidad;
//						$sql8 = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
//						$result8 = mysqli_query($con, $sql8);
//						while($crowl = mysqli_fetch_assoc($result8))
//						{
//							$cantidad2 = $crowl['cantidad'];
//							$saldo = $cantidad2 - $cantidad;
//							$serie_unico = $crowl['producto_unico'];
//						}
//						$sql66 = "UPDATE `productos` SET cantidad='$saldo' WHERE codigo='$producto'";
//						mysqli_query($con, $sql66);
//						//--ACTUALIZAR SERIE EN SERIES
//						if ($serie_unico == "si")
//						{
//							$sql22 = "UPDATE `series` SET asignado='$cliente' WHERE serie='$serie'";
//		 					mysqli_query($con, $sql22);
//						}
//						
//						//--ACTUALIZAR CANTIDAD DE INVENTARIO EN BODEGA CORRESPONDIENTE
//						$bodegabuscar;
//						$sql82 = "SELECT * from `".$bodegabuscar."` WHERE `codigo` LIKE '$producto'";
//						$busq = mysqli_query($con, $sql82);
//						while($crowla = mysqli_fetch_assoc($busq))
//						{
//							$cantidad22 = $crowla['cantidad'];
//							$saldo2 = $cantidad22 - $cantidad;
//						}
//						$sql66 = "UPDATE `".$bodegabuscar."` SET cantidad='$saldo2' WHERE codigo='$producto'";
//						mysqli_query($con, $sql66);
////-----BUSCAR ULTIMO SERVICIO TECNICO Y SUMAR 1 PARA REGISTRO
//						$sqlu = "SELECT * from `serviciotecnico` order by unico ASC";
//						$busu = mysqli_query($con, $sqlu);
//						while($crowu = mysqli_fetch_assoc($busu))
//						{
//							$unico = $crowu['unico']+1;
//						}
////----INSERTAR REGISTRO EN REGISTRO DE BODEGA CORRESPONDIENTE
//						
//						$sql = " INSERT INTO `registro` (`id`,`codigo`, `fecha`,`accion`,`cantidad`,  `saldo_anterior`, `saldo`, `usuario`, `cliente`,  `producto`,  `bodega`,  `serviciotecnico`, `observacion`, `hora`, `numerorecibo`, `serie`, `caja`, `proveedor`, `seccion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad22', '$saldo2', '$personal', '$cliente', '$producto', '$bodegabuscar', '$unico', '$observacion', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$bodegabuscar')"; 
//						mysqli_query($con, $sql);
//						
//						
//						
//						
//						//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega, serviciotecnico,observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
////						$stmt->bind_param('sssssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad22, $saldo2, $personal, $cliente, $producto, $bodegabuscar, $unico,$observacion);
////						$stmt->execute();
//												
//						//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
//						$borrar26=$_POST['documento'];
//						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
//						$result26 = mysqli_query($con, $query26);
//					}
//					
//					
//					//----INSERTAR REGISTRO DE SERVICIO TECNICO
//		$stmt = $con->prepare("INSERT INTO serviciotecnico ( id, numero, fecha, foto1 , foto2, foto3, foto4, cliente, pagado, ip, router, producto, bobina, plan, longitud, latitud, potencia, pon, descripcion, cantidad, personal, tecnico1, tecnico2, tecnico3, tecnico4, factura, observacion, motivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
//		$stmt->bind_param('ssssssssssssssssssssssssssss', $id, $idregistro, $fecha, $foto1, $foto2, $foto3, $foto4, $cliente, $pagado, $ip, $router, $producto, $bobina, $plan, $longitud, $latitud, $potencia, $pon,$descripcion, $cantidad, $personal, $tecnico1, $tecnico2, $tecnico3, $tecnico4, $factura, $observaciones, $motivo);
//		$stmt->execute();
////----INSERTAR REGISTRO EN REGISTRO
//					
//					
//					
//					
//		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`,`accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`,`cliente` , `producto`,  `bodega`,  `hora`, `numerorecibo`,`serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad2', '$saldo', '$personal', '$cliente', '$producto', '$bodegageneral', '$vacio', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$bodegageneral', '$vacio')"; 
//		mysqli_query($con, $sql);
//					
//					
//					
//		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
////		$stmt->bind_param('sssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad2, $saldo, $personal, $cliente, $producto, $bodegageneral);
////		$stmt->execute();
//		//echo $codigo;
//		
//		//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
//		$borrar26=$_POST['documento'];
//		$documento_contrato=$_POST['documento_contrato'];
//		$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
//		$result26 = mysqli_query($con, $query26);
//		$query22 = "DELETE FROM clienteasignar WHERE contrato = '$documento_contrato'";
//		$result22 = mysqli_query($con, $query22);
//				}
				
				
//--- procesar si es armado de caja
				if (strpos($armadocaja, 'si') !== false) 
				{
					
					//--buscar productos para registrar eel producto de la instalacion
					$sql3 = "SELECT * from `tempserviciotecnico` WHERE `personal` LIKE '$bodega' order by created_at DESC";
					$result3 = mysqli_query($con, $sql3);
					while($crow3 = mysqli_fetch_assoc($result3))
            			{
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$cantidadfac = $crow3['cantidad'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie  = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$codigoproducto2 = $crow3['producto'];
						$descripcion = $crow3['description'];
						$cantidad = $crow3['cantidad'];
						$observacion = $crow3['description'];
						$valorfac = $crow3['precio'];
						if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$cantidadfac = $crow3['cantidad'];
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$total2 = round($total2, 2);
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$subtotal2= $cantidadfac * $valorfac;
						$observacion = $crow3['description'];
//-- Aqui se factura el producto que hayan escogido para la facturacion
			
						$precio2 = $crow3['precio'];
						if($precio2 != "Sin_Facturar")
						{
							$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param('ssssssssssssssssss', $id2, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidad, $precio2, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
							$stmt->execute();
						}
						
//-- fin de la facturacion en instalacion nueva
						////actualizar latitud y longitud para graficar
//						$sql66 = "UPDATE `clientegps` SET lat='$latitud', lng='$longitud', ip='$ip', ipgestion='$ipgestion', nodo='$nodo' WHERE codigo='$cliente'";
		 				//mysqli_query($con, $sql66);
						//--ACTUALIZAR CANTIDAD DE INVENTARIO GENERAL
						$codigoproducto2 = $producto;
						$cantidad;
						$sql8 = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
						$result8 = mysqli_query($con, $sql8);
						while($crowl = mysqli_fetch_assoc($result8))
						{
							$cantidad2 = $crowl['cantidad'];
							$serie_unico = $crowl['producto_unico'];
							$saldo = $cantidad2 - $cantidad;
							$facturarex = $crowl['metraje']; 
							$valorfac = $crowl['preciouno']; 
							
							if($facturarex != "0")
							{
								
								//--GRABAR EN VENTAS
						
								
								$cantidadocu = $crow3['cantidad'];
								//calcular metraje extra 
								$cantidadfac = $cantidadocu - $facturarex;
								if ($cantidadfac >=1)
								{
									if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
									
									$subtotal2 =$preciototal2;
									$iva2 =$subtotal2 * $ivadecimal;
									$total2 =$subtotal2 + $iva2;
									$vencimiento ="1";
									$descuento ="1";
									$borrar = $crow3['id'];
									$documento = $crow3['title'];
									$id = $crow3['title'];
									$serie = $crow3['serie'];
									$numero = $crow3['title'];
									$bodegabuscar = "bodega".$bodega;
									$producto = $crow3['producto'];
									$descripcion = $crow3['description'];
									if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
									if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
									$preciototal2 =$cantidadfac * $valorfac;
									$subtotal2 =$preciototal2;
									$iva2 =$subtotal2 * $ivadecimal;
									$total2 =$subtotal2 + $iva2;
									$total2 = round($total2, 2);
									$vencimiento ="1";
									$descuento ="1";
									$borrar = $crow3['id'];
									$documento = $crow3['title'];
									$id = $crow3['title'];
									$serie = $crow3['serie'];
									$numero = $crow3['title'];
									$bodegabuscar = "bodega".$bodega;
									$producto = $crow3['producto'];
									$descripcion = $crow3['description'];
									$subtotal2= $cantidadfac * $valorfac;
									$observacion = $crow3['description'];
									$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$stmt->bind_param('ssssssssssssssssss', $id, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidadfac, $valorfac, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
									$stmt->execute();
								}
								
								
								
								
								
							}
							
							
							
							
							
							
							
							
							
							
						}
						$sql66 = "UPDATE `productos` SET cantidad='$saldo' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
						//--ACTUALIZAR SERIE EN SERIES
						if ($serie_unico == "si")
						{
							$sql22 = "UPDATE `series` SET asignado='$cliente' WHERE serie='$serie'";
		 					mysqli_query($con, $sql22);
						}
						
//--ACTUALIZAR CANTIDAD DE INVENTARIO EN BODEGA CORRESPONDIENTE
						$bodegabuscar;
						$sql82 = "SELECT * from `".$bodegabuscar."` WHERE `codigo` LIKE '$producto'";
						$busq = mysqli_query($con, $sql82);
						while($crowla = mysqli_fetch_assoc($busq))
						{
							$cantidad22 = $crowla['cantidad'];
							$saldo2 = $cantidad22 - $cantidad;
						}
						$sql66 = "UPDATE `".$bodegabuscar."` SET cantidad='$saldo2' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
//-----BUSCAR ULTIMO SERVICIO TECNICO Y SUMAR 1 PARA REGISTRO
						$sqlu = "SELECT * from `serviciotecnico` order by unico ASC";
						$busu = mysqli_query($con, $sqlu);
						while($crowu = mysqli_fetch_assoc($busu))
						{
							$unico = $crowu['unico']+1;
							
						}
//----INSERTAR REGISTRO EN REGISTRO DE BODEGA CORRESPONDIENTE
						
						
						
						$sql = " INSERT INTO `registro` (`id`,`codigo`, `fecha`,`accion`,`cantidad`,  `saldo_anterior`, `saldo`, `usuario`, `cliente`,  `producto`,  `bodega`,  `serviciotecnico`, `observacion`, `hora`, `numerorecibo`, `serie`, `caja`, `proveedor`, `seccion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad22', '$saldo2', '$personal', '$cliente', '$producto', '$bodegabuscar', '$unico', '$observacion', '$vacio', '$vacio', '$serie', '$vacio', '$vacio', '$bodegabuscar')"; 
						mysqli_query($con, $sql);
						
						
						//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega, serviciotecnico,observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//						$stmt->bind_param('sssssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad22, $saldo2, $personal, $cliente, $producto, $bodegabuscar, $unico, $observacion);
//						$stmt->execute();
						//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);
						
						
					}	
					
					
					
					
					//----INSERTAR REGISTRO DE SERVICIO TECNICO
		$stmt = $con->prepare("INSERT INTO serviciotecnico ( id, numero, fecha, foto1 , foto2, foto3, foto4, cliente, pagado, ip, router, producto, bobina, plan, longitud, latitud, potencia, pon, descripcion, cantidad, personal, tecnico1, tecnico2, tecnico3, tecnico4, factura, observacion, motivo, nodo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?, ?)");
		$stmt->bind_param('sssssssssssssssssssssssssssss', $id, $contratocliente, $fecha, $foto1, $foto2, $foto3, $foto4, $cliente, $pagado, $ip, $router, $producto, $bobina, $plan, $longitud, $latitud, $potencia, $pon,$descripcion, $cantidad, $personal, $tecnico1, $tecnico2, $tecnico3, $tecnico4, $factura, $observaciones, $motivo, $nodo);
		$stmt->execute();
//----INSERTAR REGISTRO EN REGISTRO
					
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`,`accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`,`cliente` , `producto`,  `bodega`,  `hora`, `numerorecibo`,`serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad2', '$saldo', '$personal', '$cliente', '$producto', '$bodegageneral', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$bodegageneral', '$vacio')"; 
		mysqli_query($con, $sql);
					
					
		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('sssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad2, $saldo, $personal, $cliente, $producto, $bodegageneral);
//		$stmt->execute();
		//echo $codigo;
		//echo $codigo=$_POST['cliente'];
					
		$query23 = "DELETE FROM clienteasignar WHERE codigo = '$codigo'";
		$result23 = mysqli_query($con, $query23);
		//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
		$borrar26=$_POST['documento'];
		$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
		$result26 = mysqli_query($con, $query26);	
					
		$ipcaja = "incompleto";
		$nombres2 = "incompleto";
		$direccion ="incompleto";
		$pais = "Ecuador";
		$codigo = "incompleto";
		$longitud = $_POST['longitud'];
		$latitud = $_POST['latitud'];
		
		$stmt = $con->prepare("INSERT INTO dispositivos_empresa ( nombre, direccion, pais, codigo,ip, lat, lng) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssss', $nombres2, $direccion, $pais, $codigo, $ipcaja, $latitud , $longitud);
		$stmt->execute();
					
					
					
				}
				
				
//--- procesar si es una instalacion nueva
				if (strpos($asunto, 'Instalacion Nueva') !== false) 
				{
					
					//--buscar productos para registrar eel producto de la instalacion
					$sql3 = "SELECT * from `tempserviciotecnico` WHERE `personal` LIKE '$bodega' order by created_at DESC";
					$result3 = mysqli_query($con, $sql3);
					while($crow3 = mysqli_fetch_assoc($result3))
            			{
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$cantidadfac = $crow3['cantidad'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie  = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$codigoproducto2 = $crow3['producto'];
						$descripcion = $crow3['description'];
						$cantidad = $crow3['cantidad'];
						$observacion = $crow3['description'];
						$valorfac = $crow3['precio'];
						if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$cantidadfac = $crow3['cantidad'];
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$total2 = round($total2, 2);
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$subtotal2= $cantidadfac * $valorfac;
						$observacion = $crow3['description'];
//-- Aqui se factura el producto que hayan escogido para la facturacion
			
						$precio2 = $crow3['precio'];
						if($precio2 != "Sin_Facturar")
						{
							$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param('ssssssssssssssssss', $id2, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidad, $precio2, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
							$stmt->execute();
						}
						
//-- fin de la facturacion en instalacion nueva
						//actualizar latitud y longitud para graficar
						$sql66 = "UPDATE `clientegps` SET lat='$latitud', lng='$longitud', ip='$ip', ipgestion='$ipgestion', nodo='$nodo', serie='$serie' WHERE codigo='$cliente'";
		 				mysqli_query($con, $sql66);
						//--ACTUALIZAR CANTIDAD DE INVENTARIO GENERAL
						$codigoproducto2 = $producto;
						$cantidad;
						$sql8 = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
						$result8 = mysqli_query($con, $sql8);
						while($crowl = mysqli_fetch_assoc($result8))
						{
							$cantidad2 = $crowl['cantidad'];
							$serie_unico = $crowl['producto_unico'];
							$saldo = $cantidad2 - $cantidad;
							$facturarex = $crowl['metraje']; 
							$valorfac = $crowl['preciouno']; 
							
							if($facturarex != "0")
							{
								
								//--GRABAR EN VENTAS
						
								
								$cantidadocu = $crow3['cantidad'];
								//calcular metraje extra 
								$cantidadfac = $cantidadocu - $facturarex;
								if ($cantidadfac >=1)
								{
									$preciototal2 =$cantidadfac * $valorfac;
									$subtotal2 =$preciototal2;
									$iva2 =$subtotal2 * $ivadecimal;
									$total2 =$subtotal2 + $iva2;
									$vencimiento ="1";
									$descuento ="1";
									$borrar = $crow3['id'];
									$documento = $crow3['title'];
									$id = $crow3['title'];
									$serie = $crow3['serie'];
									$numero = $crow3['title'];
									$bodegabuscar = "bodega".$bodega;
									$producto = $crow3['producto'];
									$descripcion = $crow3['description'];
									if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
									$preciototal2 =$cantidadfac * $valorfac;
									$subtotal2 =$preciototal2;
									$iva2 =$subtotal2 * $ivadecimal;
									$total2 =$subtotal2 + $iva2;
									$total2 = round($total2, 2);
									$vencimiento ="1";
									$descuento ="1";
									$borrar = $crow3['id'];
									$documento = $crow3['title'];
									$id = $crow3['title'];
									$serie = $crow3['serie'];
									$numero = $crow3['title'];
									$bodegabuscar = "bodega".$bodega;
									$producto = $crow3['producto'];
									$descripcion = $crow3['description'];
									$subtotal2= $cantidadfac * $valorfac;
									$observacion = $crow3['description'];
									$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$stmt->bind_param('ssssssssssssssssss', $id, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidadfac, $valorfac, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
									$stmt->execute();
								}
								
								
								
								
								
							}
							
							
							
							
							
							
							
							
							
							
						}
						$sql66 = "UPDATE `productos` SET cantidad='$saldo' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
						//--ACTUALIZAR SERIE EN SERIES
						if ($serie_unico == "si")
						{
							$sql22 = "UPDATE `series` SET asignado='$cliente' WHERE serie='$serie'";
		 					mysqli_query($con, $sql22);
						}
						
//--ACTUALIZAR CANTIDAD DE INVENTARIO EN BODEGA CORRESPONDIENTE
						$bodegabuscar;
						$sql82 = "SELECT * from `".$bodegabuscar."` WHERE `codigo` LIKE '$producto'";
						$busq = mysqli_query($con, $sql82);
						while($crowla = mysqli_fetch_assoc($busq))
						{
							$cantidad22 = $crowla['cantidad'];
							$saldo2 = $cantidad22 - $cantidad;
						}
						$sql66 = "UPDATE `".$bodegabuscar."` SET cantidad='$saldo2' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
//-----BUSCAR ULTIMO SERVICIO TECNICO Y SUMAR 1 PARA REGISTRO
						$sqlu = "SELECT * from `serviciotecnico` order by unico ASC";
						$busu = mysqli_query($con, $sqlu);
						while($crowu = mysqli_fetch_assoc($busu))
						{
							$unico = $crowu['unico']+1;
							
						}
//----INSERTAR REGISTRO EN REGISTRO DE BODEGA CORRESPONDIENTE
						
						
						
						$sql = " INSERT INTO `registro` (`id`,`codigo`, `fecha`,`accion`,`cantidad`,  `saldo_anterior`, `saldo`, `usuario`, `cliente`,  `producto`,  `bodega`,  `serviciotecnico`, `observacion`, `hora`, `numerorecibo`, `serie`, `caja`, `proveedor`, `seccion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad22', '$saldo2', '$personal', '$cliente', '$producto', '$bodegabuscar', '$unico', '$observacion', '$vacio', '$vacio', '$serie', '$vacio', '$vacio', '$bodegabuscar')"; 
						mysqli_query($con, $sql);
						
						
						//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega, serviciotecnico,observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//						$stmt->bind_param('sssssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad22, $saldo2, $personal, $cliente, $producto, $bodegabuscar, $unico, $observacion);
//						$stmt->execute();
						//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);
						
						
					}	
					
					
					
					
					//----INSERTAR REGISTRO DE SERVICIO TECNICO
		$stmt = $con->prepare("INSERT INTO serviciotecnico ( id, numero, fecha, foto1 , foto2, foto3, foto4, cliente, pagado, ip, router, producto, bobina, plan, longitud, latitud, potencia, pon, descripcion, cantidad, personal, tecnico1, tecnico2, tecnico3, tecnico4, factura, observacion, motivo, nodo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?, ?)");
		$stmt->bind_param('sssssssssssssssssssssssssssss', $id, $contratocliente, $fecha, $foto1, $foto2, $foto3, $foto4, $cliente, $pagado, $ip, $router, $producto, $bobina, $plan, $longitud, $latitud, $potencia, $pon,$descripcion, $cantidad, $personal, $tecnico1, $tecnico2, $tecnico3, $tecnico4, $factura, $observaciones, $motivo, $nodo);
		$stmt->execute();
//----INSERTAR REGISTRO EN REGISTRO
					
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`,`accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`,`cliente` , `producto`,  `bodega`,  `hora`, `numerorecibo`,`serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad2', '$saldo', '$personal', '$cliente', '$producto', '$bodegageneral', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$bodegageneral', '$vacio')"; 
		mysqli_query($con, $sql);
					
					
		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('sssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad2, $saldo, $personal, $cliente, $producto, $bodegageneral);
//		$stmt->execute();
		//echo $codigo;
		//echo $codigo=$_POST['cliente'];
					
		$query23 = "DELETE FROM clienteasignar WHERE codigo = '$codigo'";
		$result23 = mysqli_query($con, $query23);
		//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);	
					
					
					
					
					
				}
//--  cuando es cambio de domicilo
				if (strpos($asunto, 'Cambio de Domicilio') !== false) 
				{
					
					//--buscar productos para registrar eel producto de la instalacion
					$sql3 = "SELECT * from `tempserviciotecnico` WHERE `personal` LIKE '$bodega' order by created_at DESC";
					$result3 = mysqli_query($con, $sql3);
					while($crow3 = mysqli_fetch_assoc($result3))
            			{
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$cantidadfac = $crow3['cantidad'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie  = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$codigoproducto2 = $crow3['producto'];
						$descripcion = $crow3['description'];
						$cantidad = $crow3['cantidad'];
						$observacion = $crow3['description'];
						$valorfac = $crow3['precio'];
						if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$cantidadfac = $crow3['cantidad'];
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$total2 = round($total2, 2);
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$subtotal2= $cantidadfac * $valorfac;
						$observacion = $crow3['description'];
//-- Aqui se factura el producto que hayan escogido para la facturacion
			
						$precio2 = $crow3['precio'];
						if($precio2 != "Sin_Facturar")
						{
							$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param('ssssssssssssssssss', $id2, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidad, $precio2, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
							$stmt->execute();
						}
						
//-- fin de la facturacion en instalacion nueva
						//actualizar latitud y longitud para graficar
						$sql66 = "UPDATE `clientegps` SET lat='$latitud', lng='$longitud', ip='$ip', ipgestion='$ipgestion', nodo='$nodo', serie='$serie' WHERE codigo='$cliente'";
		 				mysqli_query($con, $sql66);
						//--ACTUALIZAR CANTIDAD DE INVENTARIO GENERAL
						$codigoproducto2 = $producto;
						$cantidad;
						$sql8 = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
						$result8 = mysqli_query($con, $sql8);
						while($crowl = mysqli_fetch_assoc($result8))
						{
							$cantidad2 = $crowl['cantidad'];
							$serie_unico = $crowl['producto_unico'];
							$saldo = $cantidad2 - $cantidad;
							$facturarex = $crowl['metraje']; 
							$valorfac = $crowl['preciouno']; 
							
							if($facturarex != "0")
							{
								
								//--GRABAR EN VENTAS
						
								
								$cantidadocu = $crow3['cantidad'];
								//calcular metraje extra 
								$cantidadfac = $cantidadocu - $facturarex;
								if ($cantidadfac >=1)
								{
									$preciototal2 =$cantidadfac * $valorfac;
									$subtotal2 =$preciototal2;
									$iva2 =$subtotal2 * $ivadecimal;
									$total2 =$subtotal2 + $iva2;
									$vencimiento ="1";
									$descuento ="1";
									$borrar = $crow3['id'];
									$documento = $crow3['title'];
									$id = $crow3['title'];
									$serie = $crow3['serie'];
									$numero = $crow3['title'];
									$bodegabuscar = "bodega".$bodega;
									$producto = $crow3['producto'];
									$descripcion = $crow3['description'];
									if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
									$preciototal2 =$cantidadfac * $valorfac;
									$subtotal2 =$preciototal2;
									$iva2 =$subtotal2 * $ivadecimal;
									$total2 =$subtotal2 + $iva2;
									$total2 = round($total2, 2);
									$vencimiento ="1";
									$descuento ="1";
									$borrar = $crow3['id'];
									$documento = $crow3['title'];
									$id = $crow3['title'];
									$serie = $crow3['serie'];
									$numero = $crow3['title'];
									$bodegabuscar = "bodega".$bodega;
									$producto = $crow3['producto'];
									$descripcion = $crow3['description'];
									$subtotal2= $cantidadfac * $valorfac;
									$observacion = $crow3['description'];
									$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$stmt->bind_param('ssssssssssssssssss', $id, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidadfac, $valorfac, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
									$stmt->execute();
								}
								
								
								
								
								
							}
							
							
							
							
							
							
							
							
							
							
						}
						$sql66 = "UPDATE `productos` SET cantidad='$saldo' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
						//--ACTUALIZAR SERIE EN SERIES
						if ($serie_unico == "si")
						{
							$sql22 = "UPDATE `series` SET asignado='$cliente' WHERE serie='$serie'";
		 					mysqli_query($con, $sql22);
						}
						
//--ACTUALIZAR CANTIDAD DE INVENTARIO EN BODEGA CORRESPONDIENTE
						$bodegabuscar;
						$sql82 = "SELECT * from `".$bodegabuscar."` WHERE `codigo` LIKE '$producto'";
						$busq = mysqli_query($con, $sql82);
						while($crowla = mysqli_fetch_assoc($busq))
						{
							$cantidad22 = $crowla['cantidad'];
							$saldo2 = $cantidad22 - $cantidad;
						}
						$sql66 = "UPDATE `".$bodegabuscar."` SET cantidad='$saldo2' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
//-----BUSCAR ULTIMO SERVICIO TECNICO Y SUMAR 1 PARA REGISTRO
						$sqlu = "SELECT * from `serviciotecnico` order by unico ASC";
						$busu = mysqli_query($con, $sqlu);
						while($crowu = mysqli_fetch_assoc($busu))
						{
							$unico = $crowu['unico']+1;
							
						}
//----INSERTAR REGISTRO EN REGISTRO DE BODEGA CORRESPONDIENTE
						
						
						
						$sql = " INSERT INTO `registro` (`id`,`codigo`, `fecha`,`accion`,`cantidad`,  `saldo_anterior`, `saldo`, `usuario`, `cliente`,  `producto`,  `bodega`,  `serviciotecnico`, `observacion`, `hora`, `numerorecibo`, `serie`, `caja`, `proveedor`, `seccion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad22', '$saldo2', '$personal', '$cliente', '$producto', '$bodegabuscar', '$unico', '$observacion', '$vacio', '$vacio', '$serie', '$vacio', '$vacio', '$bodegabuscar')"; 
						mysqli_query($con, $sql);
						
						
						//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega, serviciotecnico,observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//						$stmt->bind_param('sssssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad22, $saldo2, $personal, $cliente, $producto, $bodegabuscar, $unico, $observacion);
//						$stmt->execute();
						//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);
						
						
					}	
					
					
					
					
					//----INSERTAR REGISTRO DE SERVICIO TECNICO
		$stmt = $con->prepare("INSERT INTO serviciotecnico ( id, numero, fecha, foto1 , foto2, foto3, foto4, cliente, pagado, ip, router, producto, bobina, plan, longitud, latitud, potencia, pon, descripcion, cantidad, personal, tecnico1, tecnico2, tecnico3, tecnico4, factura, observacion, motivo, nodo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?, ?)");
		$stmt->bind_param('sssssssssssssssssssssssssssss', $id, $contratocliente, $fecha, $foto1, $foto2, $foto3, $foto4, $cliente, $pagado, $ip, $router, $producto, $bobina, $plan, $longitud, $latitud, $potencia, $pon,$descripcion, $cantidad, $personal, $tecnico1, $tecnico2, $tecnico3, $tecnico4, $factura, $observaciones, $motivo, $nodo);
		$stmt->execute();
//----INSERTAR REGISTRO EN REGISTRO
					
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`,`accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`,`cliente` , `producto`,  `bodega`,  `hora`, `numerorecibo`,`serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad2', '$saldo', '$personal', '$cliente', '$producto', '$bodegageneral', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$bodegageneral', '$vacio')"; 
		mysqli_query($con, $sql);
					
					
		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('sssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad2, $saldo, $personal, $cliente, $producto, $bodegageneral);
//		$stmt->execute();
		//echo $codigo;
		//echo $codigo=$_POST['cliente'];
					
		$query23 = "DELETE FROM clienteasignar WHERE codigo = '$codigo'";
		$result23 = mysqli_query($con, $query23);
		//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);	
					
					
					
					
					
				}
				else
				{
					
					//--buscar productos para registrar eel producto de la instalacion
					$sql3 = "SELECT * from `tempserviciotecnico` WHERE `personal` LIKE '$bodega' order by created_at DESC";
					$result3 = mysqli_query($con, $sql3);
					while($crow3 = mysqli_fetch_assoc($result3))
            			{
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie  = $crow3['serie'];
						$numero = $crow3['title'];
						$cantidadfac = $crow3['cantidad'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$codigoproducto2 = $producto;
						$descripcion = $crow3['description'];
						$cantidad = $crow3['cantidad'];
						$observacion = $crow3['description'];
						$valorfac = $crow3['precio'];
						if ($valorfac == "Sin_Facturar")
						{
							$valorfac = 0;
						}
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$preciototal2 =$cantidadfac * $valorfac;
						$subtotal2 =$preciototal2;
						$iva2 =$subtotal2 * $ivadecimal;
						$total2 =$subtotal2 + $iva2;
						$total2 = round($total2, 2);
						$vencimiento ="1";
						$descuento ="1";
						$borrar = $crow3['id'];
						$documento = $crow3['title'];
						$id = $crow3['title'];
						$serie = $crow3['serie'];
						$numero = $crow3['title'];
						$bodegabuscar = "bodega".$bodega;
						$producto = $crow3['producto'];
						$descripcion = $crow3['description'];
						$subtotal2= $cantidadfac * $valorfac;
						$observacion = $crow3['description'];
//-- Aqui se factura el producto que hayan escogido para la facturacion
			
						$precio2 = $crow3['precio'];
						if($precio2 != "Sin_Facturar")
						{
							$stmt = $con->prepare("INSERT INTO ventas ( id, serie, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param('ssssssssssssssssss', $id2, $serie, $fecha, $propietario, $ruc, $autorizacion, $codigocliente2, $codigoproducto2, $cantidad, $precio2, $preciototal2, $subtotal2, $iva2, $total2, $vencimiento, $descuento, $nombrecliente2, $contrato2);
							$stmt->execute();
						}
						
//-- fin de la facturacion en instalacion nueva
						//actualizar latitud y longitud para graficar
						$sql66 = "UPDATE `clientegps` SET lat='$latitud', lng='$longitud', ip='$ip', ipgestion='$ipgestion', nodo='$nodo', serie='$serie' WHERE codigo='$cliente'";
		 				mysqli_query($con, $sql66);
						//--ACTUALIZAR CANTIDAD DE INVENTARIO GENERAL
						echo $codigoproducto2 = $producto;
						$cantidad;
						$sql8 = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
						$result8 = mysqli_query($con, $sql8);
						while($crowl = mysqli_fetch_assoc($result8))
						{
							$cantidad2 = $crowl['cantidad'];
							$serie_unico = $crowl['producto_unico'];
							$saldo = $cantidad2 - $cantidad;
							$facturarex = $crowl['metraje']; 
							$valorfac = $crowl['preciouno']; 
						}	
							
						$sql66 = "UPDATE `productos` SET cantidad='$saldo' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
						//--ACTUALIZAR SERIE EN SERIES
						if ($serie_unico == "si")
						{
							$sql22 = "UPDATE `series` SET asignado='$cliente' WHERE serie='$serie'";
		 					mysqli_query($con, $sql22);
						}
						
//--ACTUALIZAR CANTIDAD DE INVENTARIO EN BODEGA CORRESPONDIENTE
						$bodegabuscar;
						$sql82 = "SELECT * from `".$bodegabuscar."` WHERE `codigo` LIKE '$producto'";
						$busq = mysqli_query($con, $sql82);
						while($crowla = mysqli_fetch_assoc($busq))
						{
							$cantidad22 = $crowla['cantidad'];
							$saldo2 = $cantidad22 - $cantidad;
						}
						$sql66 = "UPDATE `".$bodegabuscar."` SET cantidad='$saldo2' WHERE codigo='$producto'";
						mysqli_query($con, $sql66);
//-----BUSCAR ULTIMO SERVICIO TECNICO Y SUMAR 1 PARA REGISTRO
						$sqlu = "SELECT * from `serviciotecnico` order by unico ASC";
						$busu = mysqli_query($con, $sqlu);
						while($crowu = mysqli_fetch_assoc($busu))
						{
							$unico = $crowu['unico']+1;
							
						}
//----INSERTAR REGISTRO EN REGISTRO DE BODEGA CORRESPONDIENTE
						
						
						
						$sql = " INSERT INTO `registro` (`id`,`codigo`, `fecha`,`accion`,`cantidad`,  `saldo_anterior`, `saldo`, `usuario`, `cliente`,  `producto`,  `bodega`,  `serviciotecnico`, `observacion`, `hora`, `numerorecibo`, `serie`, `caja`, `proveedor`, `seccion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad22', '$saldo2', '$personal', '$cliente', '$producto', '$bodegabuscar', '$unico', '$observacion', '$vacio', '$vacio', '$serie', '$vacio', '$vacio', '$bodegabuscar')"; 
						mysqli_query($con, $sql);
						
						
						//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega, serviciotecnico,observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//						$stmt->bind_param('sssssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad22, $saldo2, $personal, $cliente, $producto, $bodegabuscar, $unico, $observacion);
//						$stmt->execute();
						//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);
						
						
					}	
					
					
					
					
					//----INSERTAR REGISTRO DE SERVICIO TECNICO
		$stmt = $con->prepare("INSERT INTO serviciotecnico ( id, numero, fecha, foto1 , foto2, foto3, foto4, cliente, pagado, ip, router, producto, bobina, plan, longitud, latitud, potencia, pon, descripcion, cantidad, personal, tecnico1, tecnico2, tecnico3, tecnico4, factura, observacion, motivo, nodo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?, ?)");
		$stmt->bind_param('sssssssssssssssssssssssssssss', $id, $contratocliente, $fecha, $foto1, $foto2, $foto3, $foto4, $cliente, $pagado, $ip, $router, $producto, $bobina, $plan, $longitud, $latitud, $potencia, $pon,$descripcion, $cantidad, $personal, $tecnico1, $tecnico2, $tecnico3, $tecnico4, $factura, $observaciones, $motivo, $nodo);
		$stmt->execute();
//----INSERTAR REGISTRO EN REGISTRO
					
		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`,`accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`,`cliente` , `producto`,  `bodega`,  `hora`, `numerorecibo`,`serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$registro', '$idregistro', '$fecha', '$accion', '$cantidad', '$cantidad2', '$saldo', '$personal', '$cliente', '$producto', '$bodegageneral', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$bodegageneral', '$vacio')"; 
		mysqli_query($con, $sql);
					
					
		//$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, producto, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('sssssssssss', $documento, $producto, $fecha, $accion, $cantidad, $cantidad2, $saldo, $personal, $cliente, $producto, $bodegageneral);
//		$stmt->execute();
		//echo $codigo;
		//echo $codigo=$_POST['cliente'];
					
		$query23 = "DELETE FROM clienteasignar WHERE codigo = '$codigo'";
		$result23 = mysqli_query($con, $query23);
		//-- BORRAR DEL REGISTRO DE TEMP SERVICIO TeCNICO en el cambio de domicilio
						$borrar26=$_POST['documento'];
						$query26 = "DELETE FROM tempserviciotecnico WHERE title = '$borrar26'";
						$result26 = mysqli_query($con, $query26);	
					
					
					
					
					
				}

			}
}


//--ACTUALIZO EL CONTRATO
$sql = "UPDATE contratos SET absoluta='$absoluta', gps1='$longitud', gps2='$latitud', nodo='$nodo', caja='$caja', puerto='$puerto', ip='$ip' WHERE numero='$contratocliente'";
mysqli_query($con, $sql);
//--FIN DE ACTUALIZACION DE CONTRATO

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
	$logow = substr($crowem['finservicio'], 2);
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
				
	
			
		$texto = "!!!!!!!!!!Aviso!!!!!!!!!!!!!  ".$nombrescliente." su servicio tecnico ha sido concluido satisfactoriamente NO RESPONDER ESTE MENSAJE";

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


//--fin de whatsapp	
?>



<meta http-equiv="Refresh" content="1;url=clientes.php">
