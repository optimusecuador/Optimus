<?php
date_default_timezone_set('America/Guayaquil');
session_start();
include('../conectar.php');

if (isset($_POST['title'])) 
{
  	$serie= "0";
	$destino= "0";
	$title = $_POST['title'];
	$producto = $_POST['producto'];
	$_SESSION['modificarproducto']=$_POST['producto'];
	$personal = $_POST['personal'];
	$documento = $_POST['documento'];
  	$description = $_POST['description'];
  	$accion=$_POST['accion'];
	//$productocodigo=$_POST['productocodigo'];
	if (isset($_POST['serie'])) 
	{
		$serie = $_POST['serie'];
	}
	$fecha = date("Y-m-d (H:i:s)", time());
	$bodegaorigen = "bodega".$personal;
	//$bodegaorigen = strtolower($bodegaorigen);
	$cantidadorigen = 0;
	if ($accion == "egreso")
	{
	$sql3 = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$producto'order by fechaing DESC";
	$result3 = mysqli_query($con, $sql3);
	while($crow3 = mysqli_fetch_assoc($result3))
				{
					$cantidadorigen = $crow3['cantidad'];
				}
	echo $cantidadorigen; 
	echo $title;
	if($cantidadorigen < $title)
	{
		$_SESSION['mensaje'] = '1';
  
	}
	else
	{
	
  		$query = "INSERT INTO task(cantidad, description, producto, personal, title, created_at, serie) VALUES ('$title', '$description', '$producto', '$personal', '$documento', '$fecha', '$serie')";
  		$result = mysqli_query($con, $query);
		
  

	}
	
			header('Location: ingreso.php?accion=egreso');
	}

	if ($accion == "ingreso")
		{
			$query = "INSERT INTO task(cantidad, description, producto, personal, title, created_at, serie) VALUES ('$title', '$description', '$producto', '$personal', '$documento', '$fecha', '$serie')";
  			$result = mysqli_query($con, $query);
			header('Location: ingreso.php?accion=ingreso');
		
		}
	if ($accion == "cruze")
		{
			$destino = $_POST['destino'];
			$query = "INSERT INTO task(cantidad, description, producto, personal, title, created_at, serie, destino) VALUES ('$title', '$description', '$producto', '$personal', '$documento', '$fecha', '$serie', '$destino')";
  			$result = mysqli_query($con, $query);
			header('Location: cruzeproducto.php?accion=cruze');
		
		}
}
?>
