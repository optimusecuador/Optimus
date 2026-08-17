<?php
date_default_timezone_set('America/Guayaquil');
session_start();
include('../conectar.php');
$tabla3 = "task";
$tabla2 = "registro";
//$tabla = "productos";
$accion=$_POST['accion'];
$_SESSION['accioni'] = $accion ;
$saldo_anterior = 0;
$serie=0;
$vacioint = 0;
$vacio = "Vacio";
$productoegreso = "";
if (isset($_POST['accion'])) {
	
	$sql3 = "SELECT * from `".$tabla3."` order by created_at DESC";
	$result3 = mysqli_query($con, $sql3);
  	while($crowt = mysqli_fetch_assoc($result3)) 
	{ 
		
		$codigo = $crowt['producto'];
		$personal = $crowt['personal'];
		$bodegabusqueda = "bodega".$personal;
		//$bodegabusqueda = strtolower($bodegabusqueda);
		$tabla = $bodegabusqueda;
		//$tabla = strtolower($tabla);
		$id = $crowt['title'];
		$serie = $crowt['serie'];
		$fecha = $crowt['created_at'];
		$cantidad_transaccion = $crowt['cantidad'];
		$cantidad = $crowt['cantidad'];
		$producto = $crowt['producto'];
		$productoorigen = $crowt['producto'];
		$description = $crowt['description'];
		$usuario = $_SESSION['password'];
		$destino = $crowt['destino'];
		$sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		
		if ($accion == 'ingreso')
	{
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['cantidad']+$cantidad;
			$saldo_anterior = $crow['cantidad'];
			$producto = $crow['producto'];
			$serie = $crow['serie'];
			$periodo = $crow['periodo'];
		}
		$sql = "UPDATE `".$tabla."` SET cantidad='$cantidad' WHERE id='$codigo'";
		mysqli_query($con, $sql);
//-- INSERTAR REGISTRO EN REGISTRO
			
			
			
		$bodegaor = "externa";	
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$id', '$codigo', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegaor', '$bodegabusqueda', '$vacio', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$tabla', '$description')"; 
		mysqli_query($con, $sql);
	
//--VERIFICAR PRODUCTO EN BODEGA CORRESPONIENTE
		echo $bodegabusqueda;
		$sql5 = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result5 = mysqli_query($con, $sql5);
		$numfilas = $result5->num_rows;
		echo $numfilas;
		if ($numfilas == 0)
			{
//--BUSCAR PRODUCTO EN PRODUCTOS PARA SACAR INFORMACION
			$sqlp = "SELECT * from `productos` WHERE `codigo` LIKE '$codigo'";
			$resultp = mysqli_query($con, $sqlp);
			while($crowp = mysqli_fetch_assoc($resultp))
    	{	
			
			
			$producto = $crowp['producto'];
			$serie = $crowp['serie'];
			$periodo = $crowp['periodo'];
		}
//--CREAR PRODUCTO EN BODEGA CORRESPONDIENTE CON VALOR DE INVENTARIO
			$stmt = $con->prepare("INSERT INTO `".$bodegabusqueda."` ( id, producto, serie, fechaing , codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssss', $codigo, $producto, $serie, $fecha, $codigo, $periodo, $cantidad_transaccion);
			$stmt->execute();
        	echo "sin registro";
			}
			else
			{
//--ACTUALIZAR INVENTARIO EN BODEGA CORRESPONDIENTE
		$sql = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad2 = $crow['cantidad']+$cantidad_transaccion;
			$saldo_anterior = $crow['cantidad'];
		}
		//$sql = "UPDATE `".$bodegabusqueda."` SET cantidad='$cantidad2' WHERE id='$codigo'";
		//mysqli_query($con, $sql);
				
			}
			//echo '<script type="text/javascript">'; 
//			echo 'alert("INGRESO REALIZADO");';
//			echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
//			echo '</script>';
			header('Location: imprimir_transferencia.php');
	}
		
	if ($accion == 'egreso')
	{
		
		
		
					echo $codigo_recuperado="0";
					//$accion=$_POST['accion'];
					$motivo=$_POST['motivo'];
					echo $codigoautorizacion=$_POST['codigo'];
			
					$ocupado = "no";
					$sql4 = "SELECT * from `generar_codigo` WHERE `codigo` LIKE '$codigoautorizacion' AND `ocupado` LIKE '$ocupado' order by fecha ASC";
					$result4 = mysqli_query($con, $sql4);
		 			while($crowp = mysqli_fetch_assoc($result4))
					{
						$codigo_recuperado = $crowp['codigo'];
					}
			
					if($codigo_recuperado == $codigoautorizacion)
					{
						
						//$_SESSION['id'] = $id;
						//$_SESSION['accion'] = $accion;
						?>
						<script type="text/javascript"> 
						alert("CODIGO ACEPTADO ");
						
						</script>
						<?php
		
		
		
		
		
		while($crow = mysqli_fetch_assoc($result))
    	{	
			echo $cantidad_comparacion = $crow['cantidad'];
			$cantidad = $crow['cantidad']-$cantidad;
			$saldo_anterior = $crow['cantidad'];
		}
	
		$sql = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		while($crow = mysqli_fetch_assoc($result))
    	{	
			echo $cantidad22 = $crow['cantidad']-$cantidad_transaccion;
		}
		
		
		//echo $resultado = $cantidad_actual-$cantidad_comparacion;
		if($cantidad22 >= 0 )
		{
			
		
		
		$sql = "UPDATE `".$tabla."` SET cantidad='$cantidad' WHERE id='$codigo'";
		mysqli_query($con, $sql);
//-- INSERTAR REGISTRO EN REGISTRO
		$bodegade = "externa";
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`, `codigoautorizacion`) VALUES ( '$id', '$codigo', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegabusqueda', '$bodegade', '$vacio', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$tabla', '$description', '$codigoautorizacion')"; 
		mysqli_query($con, $sql);
		
		//$stmt = $con->prepare("INSERT INTO registro ( id, producto, fecha, accion , cantidad, saldo_anterior, saldo, usuario, cliente, bodega) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('ssssssssss', $id, $codigo, $fecha, $accion, $cantidad_transaccion, $saldo_anterior, $cantidad, $usuario, $bodegabusqueda, $bodegabusqueda);
//		$stmt->execute();
		
		//--VERIFICAR PRODUCTO EN BODEGA CORRESPONIENTE
		echo $bodegabusqueda;
		$sql5 = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result5 = mysqli_query($con, $sql5);
		$numfilas = $result5->num_rows;
		$numfilas;
		if ($numfilas == 0)
			{
//--CREAR PRODUCTO EN BODEGA CORRESPONDIENTE CON VALOR DE INVENTARIO
			$stmt = $con->prepare("INSERT INTO `".$bodegabusqueda."` ( id, producto, serie, fechaing , codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssss', $codigo, $producto, $serie, $fecha, $codigo, $periodo, $cantidad_transaccion);
			$stmt->execute();
        	echo "sin registro";
			}
			else
			{
//--ACTUALIZAR INVENTARIO EN BODEGA CORRESPONDIENTE
		$sql = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad2 = $crow['cantidad']-$cantidad_transaccion;
			$saldo_anterior = $crow['cantidad'];
			$productoegreso = $productoegreso." / ".$crow['producto'];
		}
		
	}
	
		$query22 = "DELETE FROM series WHERE serie = '$serie'";
		$result22 = mysqli_query($con, $query22);
	}
		
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
	$imagen = $crowem['ip'].$logow;
	
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
				
	
			
		$texto = "!!!!!!!!!!Alerta!!!!!!!!!!!!! Se ha registrado un EGRESO de ".$productoegreso." con Usuario ".$usuario." por concepto de ".$description." NO RESPONDER ESTE MENSAJE";

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
		
header('Location: imprimir_transferencia.php');
//--aqui va el resto del codigo devalidacion del administrador
						}
					else
					{
						
					?>
					<script type="text/javascript"> 
					alert("CODIGO INVALIDO ");
					window.location.href = "ingreso.php?accion=egreso";
					</script>
					<?php 
					}


//--FIN DE VALIDAR CODIGO DE AUTORIZACION
	
	} 
		
	if ($accion == 'cruze')
	{
		
		
		
		
		echo $codigo_recuperado="0";
					//$accion=$_POST['accion'];
					$motivo=$_POST['motivo'];
					echo $codigoautorizacion=$_POST['codigo'];
			
					$ocupado = "no";
					$sql4 = "SELECT * from `generar_codigo` WHERE `codigo` LIKE '$codigoautorizacion' AND `ocupado` LIKE '$ocupado' order by fecha ASC";
					$result4 = mysqli_query($con, $sql4);
		 			while($crowp = mysqli_fetch_assoc($result4))
					{
						$codigo_recuperado = $crowp['codigo'];
					}
			
					if($codigo_recuperado == $codigoautorizacion)
					{
						
						//$_SESSION['id'] = $id;
						//$_SESSION['accion'] = $accion;
						?>
						<script type="text/javascript"> 
						alert("CODIGO ACEPTADO ");
						
						</script>
						<?php
		
		
		
		
//------------REALIZO EL INGRESO DELPRODUCTO DONDE VA-------------
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad = $crow['cantidad']-$cantidad;
			$saldo_anterior = $crow['cantidad'];
			//$producto = $crow['destino'];
			//$serie = $crow['serie'];
			$periodo = $crow['periodo'];
		}
		$sql = "UPDATE `".$tabla."` SET cantidad='$cantidad' WHERE id='$codigo'";
		mysqli_query($con, $sql);
//-- INSERTAR REGISTRO EN REGISTRO
			
			
			
		$bodegaor = $destino;
		$id_nuevo = $id +1;
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`, `codigoautorizacion`) VALUES ( '$id_nuevo', '$codigo', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegaor', '$bodegabusqueda', '$vacio', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$tabla', '$description', '$codigoautorizacion')"; 
		mysqli_query($con, $sql);
	
//--VERIFICAR PRODUCTO EN BODEGA CORRESPONIENTE
		$bodegabusqueda;
		$sql5 = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result5 = mysqli_query($con, $sql5);
		$numfilas = $result5->num_rows;
		$numfilas;
		if ($numfilas == 0)
			{
//--BUSCAR PRODUCTO EN PRODUCTOS PARA SACAR INFORMACION
			$sqlp = "SELECT * from `productos` WHERE `codigo` LIKE '$codigo'";
			$resultp = mysqli_query($con, $sqlp);
			while($crowp = mysqli_fetch_assoc($resultp))
    	{	
			
			
			$producto = $crowp['producto'];
			$serie = $crowp['serie'];
			$periodo = $crowp['periodo'];
		}
//--CREAR PRODUCTO EN BODEGA CORRESPONDIENTE CON VALOR DE INVENTARIO
			$stmt = $con->prepare("INSERT INTO `".$bodegabusqueda."` ( id, producto, serie, fechaing , codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssss', $codigo, $producto, $serie, $fecha, $codigo, $periodo, $cantidad_transaccion);
			$stmt->execute();
        	echo "sin registro";
			}
			else
			{
//--ACTUALIZAR INVENTARIO EN BODEGA CORRESPONDIENTE
		$sql = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad2 = $crow['cantidad']-$cantidad_transaccion;
			$saldo_anterior = $crow['cantidad'];
		}
		
				
		}
		

////-----REALIZO EL INGRESO ALPRODUCTO QUE ES
		
		
		echo $codigo = $destino;
		$sqlt = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$resultt = mysqli_query($con, $sqlt);
		while($crowt = mysqli_fetch_assoc($resultt))
    	{	
			echo $cantidad = $crowt['cantidad'] + $cantidad_transaccion;
			$saldo_anterior = $crowt['cantidad'];
			$producto = $crowt['producto'];
			//$serie = $crowt['serie'];
			$periodo = $crowt['periodo'];
		}
		$sql = "UPDATE `".$tabla."` SET cantidad='$cantidad' WHERE id='$codigo'";
		mysqli_query($con, $sql);
		
		
////-- INSERTAR REGISTRO EN REGISTRO
			
			
			
		$bodegaor = $productoorigen;	
		$id_nuevo = $id_nuevo +1;
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`, `codigoautorizacion`) VALUES ( '$id', '$codigo', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$bodegaor', '$bodegabusqueda', '$vacio', '$vacio', '$vacio', '$serie', '$vacio', '$vacioint', '$vacio', '$tabla', '$description', '$codigoautorizacion')"; 
		mysqli_query($con, $sql);
	
////--VERIFICAR PRODUCTO EN BODEGA CORRESPONIENTE
		echo $bodegabusqueda;
		$sql5 = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result5 = mysqli_query($con, $sql5);
		$numfilas = $result5->num_rows;
		echo $numfilas;
		if ($numfilas == 0)
			{
////--BUSCAR PRODUCTO EN PRODUCTOS PARA SACAR INFORMACION
			$sqlp = "SELECT * from `productos` WHERE `codigo` LIKE '$codigo'";
			$resultp = mysqli_query($con, $sqlp);
			while($crowp = mysqli_fetch_assoc($resultp))
   	{	
			
			
			$producto = $crowp['producto'];
			$serie = $crowp['serie'];
			$periodo = $crowp['periodo'];
		}
////--CREAR PRODUCTO EN BODEGA CORRESPONDIENTE CON VALOR DE INVENTARIO
			$stmt = $con->prepare("INSERT INTO `".$bodegabusqueda."` ( id, producto, serie, fechaing , codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssss', $codigo, $producto, $serie, $fecha, $codigo, $periodo, $cantidad_transaccion);
			$stmt->execute();
        	echo "sin registro";
			}
			else
			{
////--ACTUALIZAR INVENTARIO EN BODEGA CORRESPONDIENTE
		$sql = "SELECT * from `".$bodegabusqueda."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad2 = $crow['cantidad']+$cantidad_transaccion;
			$saldo_anterior = $crow['cantidad'];
		}
		
				
		}
//----ACTUALIZAR SERIE	
		
		$sql = "UPDATE `series` SET producto='$destino' WHERE serie='$serie'";
		mysqli_query($con, $sql);
		header('Location: imprimir_transferencia.php');
					}
					else
					{
						
					?>
					<script type="text/javascript"> 
					alert("CODIGO INVALIDO ");
					window.location.href = "cruzeproducto.php?accion=cruze";
					</script>
					<?php 
					}


//--FIN DE VALIDAR CODIGO DE AUTORIZACION
	}
	
	
	 
  }
	
}






?>
