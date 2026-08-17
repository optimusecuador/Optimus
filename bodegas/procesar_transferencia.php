<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php 
	date_default_timezone_set('America/Guayaquil');
	require('../conectar.php');
	session_start();
	$tabla3 = "transferencia";
	$tabla2 = "registro";
	$tabla = "productos";
	$accion=$_SESSION['accion'];
	$vacioint = 0;
	$vacio = "Vacio";
	$sql3 = "SELECT * from `".$tabla3."` order by created_at DESC";
	$result3 = mysqli_query($con, $sql3);
	$sqle = "SELECT * from `configuracion` order by empresa DESC";				
$resulte = mysqli_query($con, $sqle); 
while($crowe = mysqli_fetch_assoc($resulte))
	{
		$logo= $crowe['logo'];
	}
	
	?>
<body>
<table width="100%">
  <tbody>
    <tr>
      <td width="25" colspan="2"><img src=" <?php echo $logo;?>" width="52" height="55" alt=""/></td>
      <td width="25" colspan="4"><h1>&nbsp;</h1></td>
      <td width="25" colspan="3" align="center"><img src=" <?php echo $logo;?>" width="52" height="55" alt=""/></td>
      <td width="25" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Fecha</td>
      <td colspan="5" align="left">:<?php echo $fecha = date("Y-m-d (H:i:s)", time()); ?></td>
      <td align="right" style="color: #FFFFFF">......</td>
      <td align="left">Fecha</td>
      <td colspan="5" align="left">:<?php echo $fecha = date("Y-m-d (H:i:s)", time()); ?></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td>Cant</td>
      <td>Descripcion</td>
      <td>B.Origen</td>
      <td>B.Destino</td>
      <td colspan="2">Fecha</td>
      <td>&nbsp;</td>
      <td>Cant</td>
      <td>Descripcion</td>
      <td>B.Origen</td>
      <td>B.Destino</td>
      <td colspan="2">Fecha</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>


    </tr>
	  <?php 
	  while($crowp = mysqli_fetch_assoc($result3))
    {

		  
		$codigo = $crowp['producto'];
		$codigoborrar = $crowp['id'];
		$serie = $crowp['serie'];
		$serieproducto = $crowp['serie'];
		$bodegaorigen = "bodega".$crowp['personal'];
		//$bodegaorigen = strtolower($bodegaorigen);
		$bodegadestino = "bodega".$crowp['bodegadestino'];
		//$bodegadestino = strtolower($bodegadestino);
		$bodegaserie = $crowp['bodegadestino'];
		$id = $crowp['title'];
		$fecha = $crowp['created_at'];
		$cantidad_transaccion = $crowp['cantidad'];
		$cantidad = $crowp['cantidad'];
		$producto = $crowp['producto'];
		$usuario = $_SESSION['password'];
		$description = "(transferencia )".$crowp['description'];
		
		//if($serie == "000000000")
//		{
//			$serie = $_POST['password'];
//		}
		//-- buscar existencias y procesar
	
	
		
		$sql33 = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$producto'order by fechaing DESC";
		$result33 = mysqli_query($con, $sql33);
		while($crow33 = mysqli_fetch_assoc($result33))
				{
					$cantidadorigen = $crow33['cantidad'];
				}
		$cantidadorigen; 
		$cantidad;
		if($cantidadorigen < $cantidad)
			{
				//echo $_SESSION['message'] = "NO EXISTE PRODUCTO SUFICIENTE PARA REALIZAR LA TRANSACCION";
//				echo '<script type="text/javascript">'; 
//				echo 'alert("NO EXISTE PRODUCTO SUFICIENTE PARA REALIZAR LA TRANSACCION CONTINUAR CON EL SIGUIENTE PRODUCTO");';
//				echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
//					echo '</script>';
				}
			else
			{
		  
		  
		  
		  
		  
		  
		  
		  
		  $cliente = $crowp['personal'];
	?>
    <tr>
      <td><?php echo $cliente = $crowp['cantidad'];?></td>
      <td><?php 
		  
		  $tabla = "productos";
		  $producto = $crowp['producto'];
		  $sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['producto']."<br>".$crowp['serie'];
			  $nombre =  $crow['producto'];
		  }
		  
		  ?></td>
      <td><?php 
		  
		  $tabla = "bodegas";
		  $producto = $crowp['personal'];
		  $sql = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$producto'";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['nombre'];
		  }
		  
		  ?></td>
      <td><?php 
		  
		  $tabla = "bodegas";
		  $producto = $crowp['bodegadestino'];
		  $sql = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$producto'";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['nombre'];
		  }
		  
		  ?></td>
      <td colspan="2"><?php echo $fechat = $crowp['created_at'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $cliente = $crowp['cantidad'];?></td>
      <td><?php 
		  
		  $tabla = "productos";
		  $producto = $crowp['producto'];
		  $sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['producto']."<br>".$crowp['serie'];
		  }
		  
		  ?></td>
      <td><?php 
		  
		  $tabla = "bodegas";
		  $producto = $crowp['personal'];
		  $sql = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$producto'";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['nombre'];
		  }
		  
		  ?></td>
      <td><?php 
		  
		  $tabla = "bodegas";
		  $producto = $crowp['bodegadestino'];
		  $sql = "SELECT * from `".$tabla."` WHERE `numero` LIKE '$producto'";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['nombre'];
		  }
		  
		  ?></td>
      <td colspan="2"><?php echo $fechat = $crowp['created_at'];?></td>
    </tr>
	  <?php 
		//--proceso de registro de transferencia despues de imprimir el registroç
				
			//-- ACTUALIZAR SERIALES
		$sql = "UPDATE `series` SET bodega = '$bodegaserie' WHERE serie='$serie'";
		mysqli_query($con, $sql);
		
//- BUSQUEDA DE PRODUCTO EN BODEGA ORIGEN Y RESTA EL INVENTARIO
		
		$sql = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidadrestada = $crow['cantidad']-$cantidad;
			$cantidadsumada = $crow['cantidad']+$cantidad;
			$saldo_anterior = $crow['cantidad'];
			$serie = $crow['serie'];
			$periodo = $crow['periodo'];
		}
		$sql = "UPDATE `".$bodegaorigen."` SET cantidad='$cantidadrestada' WHERE codigo='$codigo'";
		mysqli_query($con, $sql);
		$accione = "egreso";		
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$id', '$codigo', '$fecha', '$accione', '$cantidad_transaccion', '$saldo_anterior', '$cantidadrestada', '$usuario', '$bodegadestino', '$bodegaorigen', '$vacio', '$vacio', '$vacio', '$serieproducto', '$vacio', '$vacioint', '$vacio', '$bodegaorigen', '$description')"; 
		mysqli_query($con, $sql);	


//- BUSQUEDA DE PRODUCTO EN BODEGA DESTINO Y SUMA EL INVENTARIO
//--VERIFICAR PRODUCTO EN BODEGA DESTINO
		$bodegadestino;
		$sql5 = "SELECT * from `".$bodegadestino."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result5 = mysqli_query($con, $sql5);
		$numfilas = $result5->num_rows;
		 $numfilas;
		if ($numfilas == 0)
			{
//--CREAR PRODUCTO EN BODEGA DESTINO CON VALOR DE INVENTARIO
			$stock ="0";
			$stmt = $con->prepare("INSERT INTO `".$bodegadestino."` ( id, producto, serie, fechaing , codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssss', $codigo, $nombre, $serie, $fecha, $codigo, $periodo, $stock);
			$stmt->execute();
        	echo "Nuevos Productos Agregados";
			}
			//else
			//{
//--ACTUALIZAR INVENTARIO EN BODEGA DESTINO
		$sql = "SELECT * from `".$bodegadestino."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		$result = mysqli_query($con, $sql);
		while($crow = mysqli_fetch_assoc($result))
    	{	
			$cantidad2 = $crow['cantidad']+$cantidad_transaccion;
			$saldo_anterior = $crow['cantidad'];
		}
		$sql = "UPDATE `".$bodegadestino."` SET cantidad='$cantidad2',producto='$nombre' WHERE id='$codigo'";
		mysqli_query($con, $sql);

				
			//}
			//-- INSERTAR REGISTRO EN REGISTRO COMO INGRESO DE BODEGA DESTINO
				
		$accioni = "ingreso";		
		$sql = " INSERT INTO `registro` ( `id`, `producto`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ( '$id', '$codigo', '$fecha', '$accioni', '$cantidad_transaccion', '$saldo_anterior', '$cantidad2', '$usuario', '$bodegaorigen', '$bodegadestino', '$vacio', '$vacio', '$vacio', '$serieproducto', '$vacio', '$vacioint', '$vacio', '$bodegadestino', '$description')"; 
		mysqli_query($con, $sql);
			
			}	  
	  }
	  mysqli_query($con, "TRUNCATE TABLE transferencia");	
		$query = "DELETE FROM transferencia WHERE id = $codigoborrar";
  		$result = mysqli_query($con, $query);
	  ?>
    
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>

      <td>&nbsp;</td>
    </tr>

<tr>
      <td colspan="2" align="center">_______________</td>
      <td colspan="4" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
      <td colspan="4" align="center">_______________</td>
    </tr>



    <tr>
      <td colspan="2" align="center">f) Autorizada<a href="productos.php">...</a></td>
      <td colspan="4" align="center">f) Responsable</td>
      <td colspan="3" align="center">f) Autorizada</td>
      <td colspan="4" align="center">f) Responsable</td>
    </tr>
  </tbody>
</table>
</body>










<?php

	
	//--BARRIDO DE LA TABLA TRANSFERENCIA
	$sql3 = "SELECT * from `".$tabla3."` order by created_at DESC";
	$result3 = mysqli_query($con, $sql3);
  	while($crowt = mysqli_fetch_assoc($result3)) 
	{ 
		
		$codigo = $crowt['producto'];
		$codigoborrar = $crowt['id'];
		$serie = $crowt['serie'];
		$serieproducto = $crowp['serie'];
		$bodegaorigen = "bodega".$crowt['personal'];
		$bodegadestino = "bodega".$crowt['bodegadestino'];
		$bodegaserie = $crowt['bodegadestino'];
		$id = $crowt['title'];
		$fecha = $crowt['created_at'];
		$cantidad_transaccion = $crowt['cantidad'];
		$cantidad = $crowt['cantidad'];
		$producto = $crowt['producto'];
		$usuario = $_SESSION['password'];
		
		//-- buscar existencias y procesar
	
	
		
		$sql33 = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$producto'order by fechaing DESC";
		$result33 = mysqli_query($con, $sql33);
		while($crow33 = mysqli_fetch_assoc($result33))
				{
					$cantidadorigen = $crow33['cantidad'];
				}
		echo $cantidadorigen; 
		echo $cantidad;
		if($cantidadorigen < $cantidad)
			{
				//echo $_SESSION['message'] = "NO EXISTE PRODUCTO SUFICIENTE PARA REALIZAR LA TRANSACCION";
//				echo '<script type="text/javascript">'; 
//				echo 'alert("NO EXISTE PRODUCTO SUFICIENTE PARA REALIZAR LA TRANSACCION CONTINUAR CON EL SIGUIENTE PRODUCTO");';
//				echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
//					echo '</script>';
				}
			else
			{
		  
		
		
		
		
		
////-- ACTUALIZAR SERIALES
//		$sql = "UPDATE `series` SET bodega = '$bodegaserie' WHERE serie='$serie'";
//		mysqli_query($con, $sql);
//		
////- BUSQUEDA DE PRODUCTO EN BODEGA ORIGEN Y RESTA EL INVENTARIO
//		
//		$sql = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
//		$result = mysqli_query($con, $sql);
//		
//		while($crow = mysqli_fetch_assoc($result))
//    	{	
//			$cantidadrestada = $crow['cantidad']-$cantidad;
//			$cantidadsumada = $crow['cantidad']+$cantidad;
//			$saldo_anterior = $crow['cantidad'];
//			$serie = $crow['serie'];
//			$periodo = $crow['periodo'];
//		}
//		$sql = "UPDATE `".$bodegaorigen."` SET cantidad='$cantidadrestada' WHERE codigo='$codigo'";
//		mysqli_query($con, $sql);
////-- INSERTAR REGISTRO EN REGISTRO COMO EGRESO DE BODEGA ORIGEN
//		$sql3 = "INSERT INTO registro (id, producto, fecha, accion, cantidad, saldo_anterior, saldo, usuario, cliente, bodega) VALUES ('$id', '$codigo', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidadrestada', '$usuario', '$bodegadestino', '$bodegaorigen')";
//		mysqli_query($con, $sql3);
//
//
//
////- BUSQUEDA DE PRODUCTO EN BODEGA DESTINO Y SUMA EL INVENTARIO
////--VERIFICAR PRODUCTO EN BODEGA DESTINO
//		$bodegadestino;
//		$sql5 = "SELECT * from `".$bodegadestino."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
//		$result5 = mysqli_query($con, $sql5);
//		$numfilas = $result5->num_rows;
//		 $numfilas;
//		if ($numfilas == 0)
//			{
////--CREAR PRODUCTO EN BODEGA DESTINO CON VALOR DE INVENTARIO
//			$stock ="0";
//			$stmt = $con->prepare("INSERT INTO `".$bodegadestino."` ( id, producto, serie, fechaing , codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
//			$stmt->bind_param('sssssss', $codigo, $producto, $serie, $fecha, $codigo, $periodo, $stock);
//			$stmt->execute();
//        	echo "Nuevos Productos Agregados";
//			}
//			//else
//			//{
////--ACTUALIZAR INVENTARIO EN BODEGA DESTINO
//		$sql = "SELECT * from `".$bodegadestino."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
//		$result = mysqli_query($con, $sql);
//		while($crow = mysqli_fetch_assoc($result))
//    	{	
//			$cantidad2 = $crow['cantidad']+$cantidad_transaccion;
//			$saldo_anterior = $crow['cantidad'];
//		}
//		$sql = "UPDATE `".$bodegadestino."` SET cantidad='$cantidad2' WHERE id='$codigo'";
//		mysqli_query($con, $sql);
//
//				
//			//}
////-- INSERTAR REGISTRO EN REGISTRO COMO INGRESO DE BODEGA DESTINO
//		$sql3 = "INSERT INTO registro (id, producto, fecha, accion, cantidad, saldo_anterior, saldo, usuario, cliente, bodega) VALUES ('$id', '$codigo', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad2', '$usuario', '$bodegaorigen', '$bodegadestino')";
//		mysqli_query($con, $sql3);
		//mysqli_query($con, "TRUNCATE TABLE transferencia");	
//		$query = "DELETE FROM transferencia WHERE id = $codigoborrar";
//  		$result = mysqli_query($con, $query);
		
	}
	}


//echo '<script type="text/javascript">'; 
///echo 'alert("INGRESO REALIZADO");';
//echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
//echo '</script>';
	
//-- BORRAR LA TABLA TEMPORAL DE TRANSFERENCIA
//mysqli_close($con);
//header('Location: productos.php');



?>
